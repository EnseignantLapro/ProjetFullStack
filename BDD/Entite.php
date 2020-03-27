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
// fonction qui permet de soustraire les pv de la cible en fonction de pv de l'attaquant
    
    public function GetDefense($IdDefender){

        $DataDefender = $this->_Bdd->query("SELECT defense from entite WHERE id_entite =".$IdDefender."");
        $TabDataDefender = $DataDefender->fetch();
        return $TabDataDefender['defense'];
    }

    public function Attaquer($IdCible, $Defense){

        $DataCible = $this->_Bdd->query("SELECT pdv from entite WHERE id_entite =".$IdCible."");
        $TabDataCible = $DataCible->fetch();

        $Reduction = $this->_Attaque * ($Defense/200);
        $Attaque = $this->_Attaque - $Reduction;
        $NewVieCible = $TabDataCible["pdv"] - $Attaque;

        if ($NewVieCible <= 0) {

            $this->_Bdd->query("UPDATE entite set etat = 0 WHERE id_entite =" . $IdCible . "");
            $this->_Bdd->query("UPDATE entite set pdv = 0 WHERE id_mob =" . $IdCible . "");

        } else {
            // Sinon on acualise ses point de vie à ses points de vie moins les dégats de l'attaquant
            $this->_Bdd->query("UPDATE entite set pdv =" . $NewVieCible . " WHERE id_entite =" . $IdCible . "");
            $DataCible = $this->_Bdd->query("SELECT * from entite where id_entite = " . $IdCible . "");
            $TabDatCible = $DataCible->fetch();
            echo "<div><p> la cible a ".$TabDatCible['pdv']." pdv<p>
            <div>
            <p>F5 pour attaquer (je ferais un bouton plus tard)</p></div>";
        }
        

    }
}
