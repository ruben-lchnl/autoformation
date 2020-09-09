<?php
$action = $_GET["action"];

switch($action){
    case "list" :
        $toutContinents = Continent::findAll();
        include("vues/listeContinents.php");
    break;

    case "add" :
        $mode="Ajouter";
        include("vues/formContinent.php");
    break;

    case "update" :
        $mode="Modifier";
        $continent=Continent::findById($_GET["num"]);
        include("vues/formContinent.php");
    break;

    case "delete" :
        $continent = Continent::findById($_GET["num"]);
        $nb=Continent::deleteContinent($continent);
        if($nb){
            $_SESSION["info"]=["success" => "la variable à bien été supprimé"];
        }else{
            $_SESSION["info"]=["danger" => "Il semble qu'il y a un problème"];
        }
        header("location: index.php?uc=continent&action=list");
    break;
    
    case "validForm" :
        $continent = new Continent();
        if(empty($_POST["num"])){ // cas d'une création
            $lib = $_POST["libelle"];
            $continent->setLibelle($lib);
            $nb=Continent::add($continent);
            $info = "ajouté";
        }
        else{ // cas d'une modif
            $continent->setLibelle($_POST["libelle"]);
            $continent->setNum($_POST["num"]);
            $nb=Continent::update($continent);
            $info = "modifié";
        }

        if($nb){
            $_SESSION["info"]=["success" => "la variable à bien été $info"];
        }else{
            $_SESSION["info"]=["danger" => "Il semble qu'il y a un problème"];
        }
        // rediréction
        header("location: index.php?uc=continent&action=list");
    break;
}
?>