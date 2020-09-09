<?php
class Continent{ 
    /**
     * numero du continent
     * 
     * @var int
     */
    private $num;

    /**
     * libellé du continent
     *
     * @var string
     */
    private $libelle;

    /**
     * Get numero du continent
     *
     * @return  int
     */ 
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set le numero du continent
     *
     * @param  int  $num  numero du continent
     *
     * @return  self
     */ 
    public function setNum(int $num): self // faites genre que cette erreur n'existe pas
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get libellé du continent
     *
     * @return  string
     */ 
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * Set libellé du continent
     *
     * @param  string  $libelle  libellé du continent
     *
     * @return  self
     */ 
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }
    
    /**
     * Retourne l'ensemble des conntinents
     *
     * @return Continents[] tableau d'objet continent
     */
    public static function findAll(): array
    {
        $req=MonPdo::getInstance()->prepare("SELECT * FROM continent");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Continent");
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * Trouve un continent par son num
     *
     * @param integer $id numéro du continent
     * @return Continent objet continent trouvé
     */
    public static function findById(int $id): Continent
    {
        $req=MonPdo::getInstance()->prepare("SELECT * FROM continent WHERE num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Continent");
        $req->bindParam(':id',$id);
        $req->execute();
        $leResultat=$req->fetch();
        return $leResultat;
    }

    /**
     * Permet d'ajouter un continent
     *
     * @param Continent $continent continent à ajouter
     * @return integer resultat (1 si succes, 0 si echec)
     */
    public static function add(Continent $continent): int
    {
        $req=MonPdo::getInstance()->prepare("INSERT INTO continent(libelle) VALUE (:libelle)");
        $libelle = $continent->getLibelle();
        $req->bindParam(":libelle",$libelle);
        $nb = $req->execute();
        return $nb;
    }

    /**
     * Permet de modifier un continent
     *
     * @param Continent $continent continent à modifier
     * @return integer resultat (1 si succès 0 si echec)
     */
    public static function update(Continent $continent): int
    {
        $req=MonPdo::getInstance()->prepare("UPDATE continent SET libelle= :libelle WHERE num= :num");
        $num = $continent->getNum();
        $libelle = $continent->getLibelle();
        $req->bindParam(":libelle", $libelle );
        $req->bindParam(":num", $num );
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer un continent
     *
     * @param Continent $continent continent à supprimer
     * @return integer resultat (1 si succès 0 si echec)
     */
    public static function deleteContinent(Continent $continent): int
    {
        $req=MonPdo::getInstance()->prepare("DELETE FROM continent WHERE num= :id");
        $num = $continent->getNum();
        $req->bindParam(":id", $num);
        $nb = $req->execute();
        return $nb;
    }

    
}
?>