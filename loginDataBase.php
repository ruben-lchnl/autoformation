<?php
// variables de connexion à la base
$host = "host=localhost";
$dbName = "biblio";
$user = "root";
$pwd = "";

try{
  // connexion à la base
  $db = new PDO("mysql:$host;dbname=$dbName;charset=utf8", $user, $pwd);
  // active la gestion d'erreur
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
  echo $e->getMessage();
  $db = null; // déstruction de la connexion
}