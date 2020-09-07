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
     * Get libellé du continent
     *
     * @return  string
     */ 
    public function getLibelle()
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
    public function setLibelle(string $libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }
    

    /**
     * Retourne l'ensemble des conntinents
     *
     * @return Continents[] tableau d'objet continent
     */
    public static function findAll()
    {
        $req=MonPdo::getInstance()->prepare("SELECT * FROM continents");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Continents");
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
    public static function findById(int $id)
    {
        $req=MonPdo::getInstance()->prepare("SELECT * FROM continents WHERE num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Continents");
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
    public static function add(Continent $continent)
    {
        $req=MonPdo::getInstance()->prepare("INSERT INTO continent(libelle) VALUE :libelle");
        $req->bindParam(":libelle",$continent->getLibelle());
        $nb = $req->execute();
        return $nb;
    }

    /**
     * Permet de modifier un continent
     *
     * @param Continent $continent continent à modifier
     * @return integer resultat (1 si succès 0 si echec)
     */
    public static function update(Continent $continent)
    {
        $req=MonPdo::getInstance()->prepare("UPDATE continent SET libelle= :libelle WHERE num= :num");
        $req->binbParam(":libelle", $continent->getLibelle());
        $req->binbParam(":num", $continent->getNum());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer un continent
     *
     * @param Continent $continent continent à supprimer
     * @return integer resultat (1 si succès 0 si echec)
     */
    public static function deleteContinent(Continent $continent)
    {
        $req=MonPdo::getInstance()->prepare("DELETE FROM continent WHERE num= :num");
        $req->bindParam(":id",$continent->getNum());
        $nb = $req->execute();
        return $nb;
    }

    

    
}
?>