<?php 
    include ('./header.php');
    include ("./loginDataBase.php");
?>
            <?php
                $num = $_GET["num"];
                $req = $db->prepare("DELETE FROM nationalite where num = :num");
                $req->bindParam(":num",$num);
                $valid = $req->execute();

                    if($valid){
                        $_SESSION["info"]=["success"=>"<i class='fas fa-thumbs-up'></i>Tout c'est très bien passé, la nationalité à été supprimé !"];
                    }else{
                        $_SESSION["info"]=["warning"=>"<i class='fas fa-thumbs-down'></i>Il semble qu'il y à un problème !"];
                    }
                    header("location: ./listeNationalite.php");
                    
            ?>

