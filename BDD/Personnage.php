<?php

class Personnage{

    private $_id;
    private $_pseudo;
    private $_vie;
    private $_attaque;

    public function __construct($idDuPseudo)
    {
        $this->_id = $idDuPseudo;

        //go to base chercher les info du personnages par id


        //verifier que id est coorrect sinon simulé un perso

        $this->_pseudo = "Perso Simulé N°" . $idDuPseudo;
        $this->_vie = 50;  // La vie sera prédéfini à celle du niveau 1.
        $this->_attaque = 5;  // L'attaque sera défini à celle du niveau 1.
    }

    //Accesseur
    function getID()
    {
        return $this->_id;
    }
    function setPseudo($nouveauSpoeudo)
    {
        return $this->_pseudo = $nouveauSpoeudo;
    }


    public function AfficherStats()
    {

        echo "Votre pseudo est " . $this->_pseudo . " Vous avez " . $this->_vie . " PV et " . $this->_attaque . " d'attaque";
    }
}

?>