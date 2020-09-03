<?php
class Auteur
{
    private $num;
    private $nom;
    private $prenom;
    private $nationalite;

    public function getNum(){
        return $this->num;
    }
    public function getNom(){
        return ucwords($this->nom); 
    }
    public function getPrenom(){
        return ucwords($this->prenom);
    }
    public function getNationalite(){
        return ucwords($this->nationalite);
    }
}
?>