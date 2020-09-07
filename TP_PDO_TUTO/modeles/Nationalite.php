<?php
class Nationalite {
    
    
    /**
     * numero de la nationalité
     * 
     * @var int
     */
    private $num;

    /**
     * libellé de la nationalité
     *
     * @var string
     */
    private $libelle;

    /**
     * num Continent
     *
     * @return int
     */
    private $numContinent;
    
    /**
     * Renvoie l'objet continent associé
     * 
     * @return Continent
     */ 
    public function getNumContinent()
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * Set num Continent
     *
     * @return  self
     */ 
    public function setNumContinent(Continent $continent)
    {
        $this->numContinent = $continent->getNum();

        return $this;
    }
    /**
     * Get numero de la nationalité
     *
     * @return  int
     */ 
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Get libellé de la nationalité
     *
     * @return  string
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set libellé de la nationalité
     *
     * @param  string  $libelle  libellé de la nationalité
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
     * @return Nationalite[] tableau d'objet nationalite
     */
    public static function findAll()
    {
        $req=MonPdo::getInstance()->prepare("SELECT n.num AS numero,n.libelle AS 'libNation', c.libelle AS 'libContinent' FROM nationalite n,continent c WHERE n.numContinent=c.num");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }

    /**
     * Trouve un nationalite par son num
     *
     * @param integer $id numéro de la nationalité
     * @return Nationalite objet nationalite trouvé
     */
    public static function findById(int $id)
    {
        $req=MonPdo::getInstance()->prepare("SELECT * FROM nationalite WHERE num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Nationalite");
        $req->bindParam(':id',$id);
        $req->execute();
        $leResultat=$req->fetch();
        return $leResultat;
    }

    /**
     * Permet d'ajouter un nationalite
     *
     * @param Nationalite $nationalite nationalite à ajouter
     * @return integer resultat (1 si succes, 0 si echec)
     */
    public static function add(Nationalite $nationalite)
    {
        $req=MonPdo::getInstance()->prepare("INSERT INTO nationalite(libelle,numContinent) VALUES (:libelle, :numContinent)");
        $req->bindParam(":libelle",$nationalite->getLibelle());
        $req->bindParam(":numContinent",$nationalite->getNumContinent());
        $nb = $req->execute();
        return $nb;
    }

    /**
     * Permet de modifier un nationalite
     *
     * @param Nationalite $nationalite nationalite à modifier
     * @return integer resultat (1 si succès 0 si echec)
     */
    public static function update(Nationalite $nationalite)
    {
        $req=MonPdo::getInstance()->prepare("UPDATE nationalite SET libelle= :libelle WHERE num= :num");
        $req->binbParam(":libelle", $nationalite->getLibelle());
        $req->binbParam(":num", $nationalite->getNum());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer un nationalite
     *
     * @param Nationalite $nationalite nationalite à supprimer
     * @return integer resultat (1 si succès 0 si echec)
     */
    public static function deleteNationalite(Nationalite $nationalite)
    {
        $req=MonPdo::getInstance()->prepare("DELETE FROM nationalite WHERE num= :num");
        $req->bindParam(":id",$nationalite->getNum());
        $nb = $req->execute();
        return $nb;
    }

    

    

    
}
?>