<?php
// Dev By Wantelez Florian
class Entite
{
    private $_IdEntite;
    private $_Nom;
    private $_Pdv;
    private $_Attaque;
    private $_Defense;
    private $_Niveau;
    private $_etat;

    public function __construct($IdEntite,$Bdd)
    {
        $this->_IdEntite = $IdEntite;

        $DataEntite = $Bdd->query('SELECT * FROM entite where id_entite ="'.$IdEntite.'"');

        if(isset($DataEntite)) 
        {
            //TODO Traiter le cas ou DataEntite est pas un objet de requete
            $TabDataEntite = $DataEntite->fetch();
            // On récupère toutes les infos de l'entité
            $this->_IdArme = $TabDataEntite["id_arme"];
            $this->_IdArmure = $TabDataEntite["id_armure"];
            $this->_Nom = $TabDataEntite["nom"];
            $this->_IdArme = $TabDataEntite["id_arme"];
            $this->_Pdv = $TabDataEntite["pdv"];
            $this->_Attaque = $TabDataEntite["attaque"];
            $this->_Defense = $TabDataEntite["defense"];
            $this->_Niveau = $TabDataEntite["niveau"];
            $this->_etat = $TabDataEntite["etat"];
        } 
        else 
        {
            echo "L'objet est vide";
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
    public function getEtat()
    {
        return $this->_etat;
    }
    public function getId()
    {
        return $this->_IdEntite;
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
    public function setEtat($NewEtat)
    {
        $this->_etat = $NewEtat;
    }
}
