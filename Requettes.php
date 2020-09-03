<?php
// Requettes Action
try{
  include ('./loginDataBase.php');
  // préparation de la requette
  $req = $db->prepare("INSERT INTO genre (libelle) VALUE ('Espionnage')");

  // execution de la requette et récuperation du résultat
  $nbr = $req->execute();

  echo("nombre d'insersion :".$nbr."<br/>");
  // affichage de l'id au cas d'autoincrément
  $id = $db->lastInsertId();
  echo ("Le numéro attribué est : ".$id);

}catch (PDOException $e){
  echo $e->getMessage();
  //$db = null;
}
    
// Requettes selection

  $req = $db->prepare("SELECT * FROM auteur"); // préparation de la requette
  $req->execute(); // execution de la requette

  // $req->setFetchMode(PDO::FETCH_ASSOC); // mettre dans des tableaux avec comme clés les noms des champs
  // $req->setFetchMode(PDO::FETCH_NUM) // mettre dans des tableau avec comme clés des valeurs numériques
  $req->setFetchMode(PDO::FETCH_OBJ); // les donnés sont des objets
  // $req->setFetchMode(PDO::FETCH_CLASS, 'Auteur'); // les donnés sont dans la classe mis en parametre
  $tableau = $req->fetchAll(); // tout récupérer et mettre dans taableau avec le mode indiqué
  foreach ($tableau as $ligne){
    echo "<tr>";
    echo "<td>".$ligne->num."</td>
    <td>".$ligne->nom."</td>
    <td>".$ligne->prenom."</td>
    <td>".$ligne->nationalite."</td>";
    echo "</tr>";
  }
?>