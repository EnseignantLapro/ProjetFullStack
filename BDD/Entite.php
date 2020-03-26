<?php
class entite
{
    private $_IdEntite;
    private $_IdArme;
    private $_IdArmure;
    private $_Nom;
    private $_Pdv;
    private $_Attaque;
    private $_Defense;
    private $_Niveau;
    private $_eta;
    private $_Bdd;

    public function __construct($IdEntite, $Bdd)
    {
        $this->_Bdd = $Bdd;

        $DataEntite = $this->_Bdd->query("SELECT * from entite where id_entite =" . $IdEntite . "");
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
        $this->_eta = $TabDataEntite["eta"];
    }

    public function Attaquer(){

        
    }
}
