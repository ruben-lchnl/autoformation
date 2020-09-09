<?php 
ob_start();
session_start();
include ('vues/header.php');
include ("vues/infoFlash.php");
include ("modeles/Continent.php");
include ("modeles/monPdo.php");

//include ("modeles/Nationalite.php");  

$uc = empty($_GET["uc"]) ? "accueil" : $_GET["uc"];

switch($uc){
    case "accueil" :
        include("vues/accueil.php");
    break;
    case "continent" :
        include("controllers/continentController.php");
    break;
}

include ('vues/footer.php');
?>