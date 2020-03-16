<?php

class Personnage{

    private $_Id;
    private $_Pseudo;
    private $_Vie;
    private $_Attaque;

    public function __construct($IdDuPseudo)
    {
        $bdd = new PDO('mysql:host=' . $adresse . '; dbname='.$name.'; charset=utf8', '' . $id . '', '' . $mdp . '');
        $DataPersonnage = $bdd->query("SELECT * from personnage where id =".$IdDuPseudo."");
        $TabDataPersonnage = $DataPersonnage->fetch();
        $this->_Id = $IdDuPseudo;
        $this->_Vie = $TabDataPersonnage['vie'];
        $this->_Attaque = $TabDataPersonnage['attaque']; 

        //go to base chercher les info du personnages par id


        //verifier que id est coorrect sinon simulé un perso

        $this->_Pseudo = "Perso Simulé N°" . $IdDuPseudo;
        $this->_Vie = 50;  // La vie sera prédéfini à celle du niveau 1.
        $this->_Attaque = 5;  // L'attaque sera défini à celle du niveau 1.
    }
        // Dev By Wantelez (pas encore fini)
     public function Attaque($IdAgresseur, $IdVictime) {

        $bdd = new PDO('mysql:host=' . $adresse . '; dbname='.$name.'; charset=utf8', '' . $id . '', '' . $mdp . '');
  
     }
    //Accesseur
    function GetID()
    {
        return $this->_Id;
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
