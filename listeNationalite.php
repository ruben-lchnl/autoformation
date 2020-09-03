<?php include ('./header.php');
    include ('./loginDataBase.php');
    
    $req = $db->prepare("SELECT * FROM nationalite");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->execute();
    $toutNationalite = $req->fetchAll();
?>

    <div class="container mt-5">
        <div class="row pt-4">
            <div class="col-9"><h3>Listes des nationalités</h3></div>
            <div class="col-3"><a href="./formNationalite.php?action=Ajouter" class="btn btn-primary"><i class="fas fa-plus"></i> Créer une nationalité</a></div>
        </div>
        
    <table class="table table-hover table-striped">
  <thead class="thead-dark">
    <tr class="d-flex">
      <th scope="col" class="col-md-2">Numéro</th>
      <th scope="col" class="col-md-5">Libellé</th>
      <th scope="col" class="col-md-5">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($toutNationalite as $nationalite){
            echo "<tr class='d-flex'>";
            echo "<td class='col-md-2'>$nationalite->num</td>";
            echo "<td class='col-md-5'>$nationalite->libelle</td>";
            echo "<td class='col-md-5'>
                <a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-info'><i class='fas fa-pen-alt'></i> Modifier une nationalité</a>
                <a href='#supprModal' class='btn btn-danger data-target=\"modal\"'><i class='fas fa-trash-alt'></i> Effacer une nationalité</a>
            </td>";
            echo "</tr>";//supprNationalite.php?num=$nationalite->num
        }
    ?>
  </tbody>
</table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="supprModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Attention</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Confirmez vous la suppression de cette nationalité ?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <a href="./supprNationalite.php" class="btn btn-danger">Supprimer</a>
        </div>
        </div>
    </div>
    </div>

<?php include ('./footer.php'); ?>