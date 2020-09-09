<?php
if(!empty($_SESSION["info"])){
        $allMessage = $_SESSION["info"];
        var_dump($info);
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