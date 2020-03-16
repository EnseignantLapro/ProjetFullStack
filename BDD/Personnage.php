<?php

class Personnage
{

    private $_Id;
    private $_Pseudo;
    private $_Vie;
    private $_Attaque;

    public function __construct($IdDuPseudo)
    {
        $this->_Id = $IdDuPseudo;

        //go to base chercher les info du personnages par id


        //verifier que id est coorrect sinon simulé un perso

        $this->_Pseudo = "Perso Simulé N°" . $IdDuPseudo;
        $this->_Vie = 50;  // La vie sera prédéfini à celle du niveau 1.
        $this->_Attaque = 5;  // L'attaque sera défini à celle du niveau 1.
    }
    // Dev By Wantelez
    public function Attaque()
    {

    }


    //Accesseur
    function GetID()
    {
        return $this->_Id;
    }

    function GetVie()
    {
        return $this->_Vie;
    }

    function SetPseudo($NouveauSpoeudo)
    {
        return $this->_Pseudo = $NouveauSpoeudo;
    }

    public function AfficherStats()
    {

        echo "Votre pseudo est " . $this->_pseudo . " Vous avez " . $this->_vie . " PV et " . $this->_attaque . " d'attaque";
    }
}
