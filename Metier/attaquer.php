<?php
//DEV BY WANTELEZ

include "../header.php";
include "../BDD/Entite.php";
/* En cours de construction*/


function Attaquer($IdAgresseur,$IdVictime,$Bdd)
{

    $Agresseur = new Entite($IdAgresseur, $Bdd);
    $Victime = new Entite($IdVictime, $Bdd);


    $ReductionDegats = $Agresseur->getAttaque() * (($Victime->getDefense() * 80 / 200) / 100);
    $DegatsAgresseur = $Agresseur->getAttaque() - $ReductionDegats;
    $VictimePdv = $Victime->getPdv() - $DegatsAgresseur;
    // Si les points de vie sont supérieure à 0 alors on set les nouveaux pdv en base
    if ($VictimePdv > 0) {
        $Victime->setPdv($VictimePdv);
        $Bdd->query("UPDATE `entite` SET `pdv` = " . $VictimePdv . " WHERE `entite`.`id_entite` = " . $Victime->getId() . "");
    // Sinon on les set à 0 et on change l'état à 0 soit mort
    } else {
        $VictimePdv = 0;
        $Victime->setPdv($VictimePdv);
        $Bdd->query("UPDATE `entite` SET `pdv` = " . $VictimePdv . ", `etat` = '0' WHERE `entite`.`id_entite` = " . $Victime->getId() . "");
    }
    echo "<div> pdv du dragon : ".$Victime->getPdv()." </div>";
}

echo "<div><p>Appuyez sur f5 pour attaquer";
//Attaquer(1,2,$Bdd);

