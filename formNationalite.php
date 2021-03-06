<?php 
include ('./header.php');
include ("./loginDataBase.php");
$action=$_GET["action"];
if($action == "Modifier"){
    $num=$_GET['num'];
    $req = $db->prepare("SELECT * FROM nationalite WHERE num = :num");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->bindParam(":num",$num);
    $req->execute();
    $laNationalite = $req->fetch();
    
}
// liste des continent
$reqContinent = $db->prepare("SELECT * FROM continent");
$reqContinent->setFetchMode(PDO::FETCH_OBJ);
$reqContinent->execute();
$allContinent = $reqContinent->fetchAll();
?>

<div class="container mt-5">
    <h2 class="pt-4 text-center"><?= $action ?> une nationalité</h2>
    <form action="./valideNationalite.php?action=<?= $action ?>" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
        <div class="form-group">
            <label for="libelle">Libellé</label>
            <input type="text" class="form-control" id="libelle" placeholder="Saisir le libellé" name="libelle" value="<?php if($action == "Modifier"){echo $laNationalite->libelle;}?>">
        </div>
        <div class="form-group">
            <label for="continent">Continent</label>
            <select name="continent" class="form-control">
                <?php
                    
                    foreach($allContinent as $continent){
                        $select=$continent->num==$laNationalite->numContinent ? "selected" : "";
                        echo "<option value='$continent->num' $select>$continent->libelle</option>";
                    }
                ?>
            </select>
        </div>
        <input type="hidden" id="num" name="num" value="<?php if($action == "Modifier"){echo $laNationalite->num;}?>">
        <div class="row">
            <div class="col"><a href="./listeNationalite.php" class="btn btn-info btn-block"><i class="fas fa-undo"></i> Revenir à la liste</a></div>
            <div class="col"><button type="submit" class="btn btn-success btn-block"><i class="fas fa-pen-alt"></i> <?= $action ?></button></div>
        </div>
    </form>
</div>

<?php include ('./footer.php'); ?>