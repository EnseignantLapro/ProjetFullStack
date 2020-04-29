<?php
include "Entite.php";
// Dev By Wantelez Florian
class Hero extends Entite
{

    private $_IdHero;
    private $_Nom;
    private $_Pdv;
    private $_Attaque;
    private $_Defense;
    private $_Potion;



    public function __construct($IdHero, $Bdd)
    {
        if (isset($IdHero)) {

            $this->_IdHero = $IdHero;

            $DataHeroExtendEntite = $Bdd->query("SELECT id_hero, nom, pdvmax, attaquemax, defensemax, potion from hero INNER JOIN entite on hero.id_hero = entite.id_entite where hero.id_hero =" . $IdHero . "");

            if (isset($DataHeroExtendEntite)) {
                //TODO Traiter le cas ou DataEntite est pas un objet de requete
                $TabDataHeroExtendEntite = $DataHeroExtendEntite->fetch();
                // On récupère toutes les infos de l'entité

                $this->_Nom = $TabDataHeroExtendEntite["nom"];
                $this->_Pdv = $TabDataHeroExtendEntite["pdvmax"];
                $this->_Attaque = $TabDataHeroExtendEntite["attaquemax"];
                $this->_Defense = $TabDataHeroExtendEntite["defensemax"];
                $this->_Potion = $TabDataHeroExtendEntite["potion"];
            } else {
                echo "Erreure la requete : retourne un objet null'";
            }
        } else {
            "Error IdHero non défini";
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
