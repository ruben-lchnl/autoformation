<?php 
    include ('./header.php');
    include ("./loginDataBase.php");
?>
<div class="container mt-5">
    <div class="row">
        <div class="col mt-5">
            <?php
                $action = $_GET["action"];
                $libelle = $_POST["libelle"];
                $num = $_POST["num"];
                if($action == "Modifier"){
                    $req = $db->prepare("UPDATE nationalite set libelle = :libelle where num = :num");
                    $req->bindParam(":libelle",$libelle);
                    $req->bindParam(":num",$num);
                    
                }else{
                    $req = $db->prepare("INSERT INTO nationalite(libelle) value(:libelle)");
                    $req->bindParam(":libelle",$libelle);
                }
                $valid = $req->execute();
                $message = $action == "Modifier" ? "modifié" : "ajoutée";
                    if($valid){
                        echo '<div class="alert alert-success" role="alert">
                                <i class="fas fa-thumbs-up"></i> Tout c\'est très bien passé, la nationalité à été '.$message.' !
                            </div>';
                    }else{
                        echo '<div class="alert alert-warning" role="alert">
                                <i class="fas fa-thumbs-up"></i> Il semble qu\'il y à un problème !
                            </div>';
                    }
            ?>
        </div>
    </div>
    <a href="./listeNationalite.php" class="btn btn-primary";><i class="fas fa-undo"></i> Retour vers la liste</a>
</div>


<?php include ('./footer.php'); ?>