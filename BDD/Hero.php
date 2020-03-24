<?php


// Dev By Fresi et Wantelez
class Hero
{

    private $_Id;
    private $_VieMob;
    private $_Attaque;
    private $_Bdd;
    private $_Vie;


    public function __construct($IdDuPseudo, $Bdd)
    {
        $this->_Bdd = $Bdd;
        //rajoute un control si la bdd existe pas je la simule
        if (!is_null($Bdd)) {
            //go to base chercher les info du personnages par id
            $DataPersonnage = $this->_Bdd->query("SELECT * from assoshero where id_assoshero =" . $IdDuPseudo . "");
            $TabDataPersonnage = $DataPersonnage->fetch();
            $this->_Id = $IdDuPseudo;
            $this->_Vie = $TabDataPersonnage['pdv'];
            $this->_Attaque = $TabDataPersonnage['attaque'];
            $DataMob = $this->_Bdd->query("SELECT * from mob where id_mob =" . $IdDuPseudo . "");
            $TabDataMob = $DataMob->fetch();
            $this->_VieMob = $TabDataMob['pdv'];

        } else {
            //verifier que id est coorrect sinon simulé un perso
            $this->_Id = 0;
            $this->_VieMob = 1000;
            $this->_Attaque = 50;
        }
    }

    // Dev by Wantelez Florian //
    // Fonction qui permet de soustraire les points de vie de la cible en fonction des point d'attaques du personnage
    public function AttaqueMob($IdMob)
    {
        //on selectionne la vie du monstre
        $DataMonstre = $this->_Bdd->query("SELECT * from mob where id_mob =" . $IdMob . "");
        $TabdDataMonstre = $DataMonstre->fetch();

        // on lui soustrais l'attaque du héro
        $NewVieMonstre = $TabdDataMonstre['pdv'] - $this->_Attaque;

        // Si ça est inférieure à 0 ou null alors il est mort on passe son état 0
        if ($NewVieMonstre <= 0) {

            $this->_Bdd->query("UPDATE mob set etat = 0 WHERE id_mob =" . $IdMob . "");
            $this->_Bdd->query("UPDATE mob set pdv = 0 WHERE id_mob =" . $IdMob . "");
            $this->_VieMob = 0;
        } else {
            // Sinon on acualise ses point de vie à ses points de vie moins les dégats de l'attaquant
            $this->_Bdd->query("UPDATE mob set pdv =" . $NewVieMonstre . " WHERE id_mob =" . $IdMob . "");
            $DataMob = $this->_Bdd->query("SELECT * from mob where id_mob = " . $IdMob . "");
            $TabDataMob = $DataMob->fetch();
            $this->_VieMob = $TabDataMob['pdv'];
        }
    }
    // Fonction qui permet de remettre les points de vie à 100
    public function ResetHp($IdMob)
    {
        $this->_Bdd->query("UPDATE mob set pdv = 100 WHERE id_mob=" . $IdMob . "");
    }

    // Dev By Fresi
    //Accesseur
    function GetID()
    {
        return $this->_Id;
    }

    // Dev By Fresi
    // Fonction qui renvoie la valeur de la vie
    function GetVieMob()
    {
        return $this->_VieMob;

    }

    // Dev By Fresi
    // Fonction pour changer de Pseudo
    function SetPseudo($NouveauSpoeudo)
    {
        return $this->_Pseudo = $NouveauSpoeudo;
    }

    // Dev By Fresi
    // Fonction qui affiche les statistiques d'un personnage
    public function AfficherStats()
    {

        echo "Votre pseudo est " . $this->_pseudo . " Vous avez " . $this->_vie . " point de vie et " . $this->_attaque . " d'attaque";
    }
}
