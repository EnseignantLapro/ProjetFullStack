<?php
//DEV BY WANTELEZ

include "../header.php";
include "../BDD/Entite.php";
/* En cours de construction*/

function Attaquer($IdAgresseur, $IdVictime, $Bdd)
{

    $Agresseur = new entite($IdAgresseur, $Bdd);
    $Victime = new entite($IdVictime, $Bdd);

    $VictimePdv = $Victime->getPdv() - $Agresseur->getAttaque();
    if ($VictimePdv > 0) {
        $Victime->setPdv($VictimePdv);
        $Bdd->query("UPDATE `entite` SET `pdv` = " . $VictimePdv . " WHERE `entite`.`id_entite` = " . $Victime->getId() . "");
    } else {
        $VictimePdv = 0;
        $Victime->setPdv($VictimePdv);
        $Bdd->query("UPDATE `entite` SET `pdv` = " . $VictimePdv . ", `etat` = '0' WHERE `entite`.`id_entite` = " . $Victime->getId() . "");
    }
    echo "<div> <p>Pdv du dragon :" . $Victime->getPdv() . "</p></div>";
}

echo "<div><p>Appuyez sur f5 pour attaquer (je ferais un btn plus tard)<p><div>";

Attaquer(1, 2, $Bdd);
