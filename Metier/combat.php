<?php
//DEV BY WANTELEZ
include "../BDD/Personnage.php";
/* En cours de construction*/
 
//déplacer cette méthode dans la couche metier , ne pas faire de requête utilisé les membres des objets
    function Attaquer($IdCible, $Defense)
    {

        $DataCible = $this->_Bdd->query("SELECT pdv from entite WHERE id_entite =" . $IdCible . "");
        $TabDataCible = $DataCible->fetch();

        $Reduction = $this->_Attaque * ($Defense / 200);
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
            echo "<div><p> la cible a " . $TabDatCible['pdv'] . " pdv<p>
            <div>
            <p>F5 pour attaquer (je ferais un bouton plus tard)</p></div>";
        }
    }
$Hero1 = new hero(12212,$bdd);
$mob1 = new mob(276233;$bdd);
/*
TU peux faire des foncitons

funtoin attaquet($hero1,$mob1){
     $mob1->getVie - $hero1->getDegat 
}

*/
?>





