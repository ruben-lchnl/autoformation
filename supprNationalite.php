<?php 
    include ('./header.php');
    include ("./loginDataBase.php");
?>
<div class="container mt-5">
    <div class="row">
        <div class="col mt-5">
            <?php
                $num = $_GET["num"];
                $req = $db->prepare("DELETE FROM nationalite where num = :num");
                $req->bindParam(":num",$num);
                $valid = $req->execute();

                    if($valid){
                        echo '<div class="alert alert-success" role="alert">
                                <i class="fas fa-thumbs-up"></i> Tout c\'est très bien passé, la nationalité à été supprimé !
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