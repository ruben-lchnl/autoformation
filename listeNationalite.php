<?php include ('./header.php');
    include ('./loginDataBase.php');
    $libelle="";
    $continent="tous";
    // liste des nations
    $textReq = "SELECT n.num,n.libelle AS 'libNation',c.libelle AS 'libContinent' FROM nationalite n, continent c WHERE n.numContinent = c.num";
    if(!empty($_GET)){
        $libelle = $_GET["libelle"];
        $continent = $_GET["continent"];
        if($libelle != "") {$textReq.= " AND n.libelle LIKE '%".$libelle."%'";}
        if($continent != "tous") {$textReq.= " AND c.num = ".$continent;}
    }
    $textReq.= " ORDER BY n.libelle";
    $req = $db->prepare($textReq);
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->execute();
    $toutNationalite = $req->fetchAll();
    // liste des continent
    $reqContinent = $db->prepare("SELECT * FROM continent");
    $reqContinent->setFetchMode(PDO::FETCH_OBJ);
    $reqContinent->execute();
    $allContinent = $reqContinent->fetchAll();

    if(!empty($_SESSION["info"])){
        $allMessage = $_SESSION["info"];
        foreach($allMessage as $key=>$info){
            echo'<div class="container mt-5 pt-5">
                    <div class="alert alert-'.$key.' alert-dismissible fade show" role="alert">'
                    .$info.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                </div>';
        }
    }
    $_SESSION["info"] = [];

?>
    
    <div class="container mt-5">
        <div class="row pt-4">
            <div class="col-9"><h3>Listes des nationalités</h3></div>
            <div class="col-3"><a href="./formNationalite.php?action=Ajouter" class="btn btn-primary"><i class="fas fa-plus"></i> Créer une nationalité</a></div>
        </div>

        <form action="#" method="GET" class="border border-primary rounded p-3">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" id="libelle" placeholder="Saisir le libellé" name="libelle" value="<?= $libelle; ?>">
                </div>
                <div class="col">
                    <select name="continent" class="form-control">
                        <?php
                            echo "<option value='tous'>Tous les continents</option>";
                            foreach($allContinent as $keyContinent){
                                $select=$keyContinent->num==$continent ? "selected" : "";
                                echo "<option value='$keyContinent->num' $select>$keyContinent->libelle</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-succes btn-block"><i class="fas fa-search"></i> Rechercher</button>
                </div>
            </div>
        </form>

    <table class="table table-hover table-striped">
  <thead class="thead-dark">
    <tr class="d-flex">
      <th scope="col" class="col-md-1">Numéro</th>
      <th scope="col" class="col-md-3">Libellé</th>
      <th scope="col" class="col-md-3">Continent</th>
      <th scope="col" class="col-md-5">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($toutNationalite as $nationalite){
            echo "<tr class='d-flex'>";
            echo "<td class='col-md-1'>$nationalite->num</td>";
            echo "<td class='col-md-3'>$nationalite->libNation</td>";
            echo "<td class='col-md-3'>$nationalite->libContinent</td>";
            echo "<td class='col-md-5'>
                <a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-info'><i class='fas fa-pen-alt'></i> Modifier une nationalité</a>
                <a href='#supprModal' class='btn btn-danger' data-info='Confirmez vous la suppression de cette nationalité ?' data-suppr='supprNationalite.php?num=$nationalite->num' data-toggle='modal'><i class='fas fa-trash-alt'></i> Effacer une nationalité</a>
            </td>";
            echo "</tr>";
        }
    ?>
  </tbody>
</table>
</div>
    

<?php include ('./footer.php'); ?>