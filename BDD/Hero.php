<?php
include "Entite.php";

class Hero extends entite
{
    private $_IdHero;
    private $_Nom;
    private $_Pdv;
    private $_Attaque;
    private $_Defense;
    private $_Potion;



    public function __construct($Bdd, $IdHero)
    {
        $this->_IdHero = $IdHero;

        $DataHero = $Bdd->query("SELECT * from entite where id_entite =" . $IdHero . "");

        if (isset($DataHero)) {
            //TODO Traiter le cas ou DataEntite est pas un objet de requete
            $TabDataHero = $DataHero->fetch();
            // On récupère toutes les infos de l'entité
            $this->_IdArme = $TabDataHero["id_arme"];
            $this->_IdArmure = $TabDataHero["id_armure"];
            $this->_Nom = $TabDataHero["nom"];
            $this->_IdArme = $TabDataHero["id_arme"];
            $this->_Pdv = $TabDataHero["pdv"];
            $this->_Attaque = $TabDataHero["attaque"];
            $this->_Defense = $TabDataHero["defense"];
            $this->_Potion = $TabDataHero["potion"];
        } else {
            echo "Erreure la requete : \"SELECT * from entite where id_entite = . $DataHero . \" ne retourne aucune valeur'";
        }
    }
    //Method Get
    public function getNom()
    {
        return $this->_Nom;
    }
    public function getPdv()
    {
        return $this->_Pdv;
    }
    public function getAttaque()
    {
        return $this->_Attaque;
    }
    public function getDefense()
    {
        return $this->_Defense;
    }
    public function getNiveau()
    {
        return $this->_Niveau;
    }
    public function getId()
    {
        return $this->_IdHero;
    }
    public function getPotion()
    {
        return $this->_Potion;
    }
    //Method Set

    public function setNom($NewName)
    {
        $this->_Nom = $NewName;
    }
    public function setPdv($NewPdv)
    {
        $this->_Pdv = $NewPdv;
    }
    public function setAttaque($NewAttaque)
    {
        $this->_Attaque = $NewAttaque;
    }
    public function setDefense($NewDefense)
    {
        $this->_Defense = $NewDefense;
    }
    public function setNiveau($NewNiveau)
    {
        $this->_Niveau = $NewNiveau;
    }
    public function setPotion($NewPotion)
    {
        $this->_Potion = $NewPotion;
    }
}
