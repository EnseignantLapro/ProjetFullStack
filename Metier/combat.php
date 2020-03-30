<?php
//DEV BY WANTELEZ

include "../header.php";
include "../BDD/Entite.php";
/* En cours de construction*/

//déplacer cette méthode dans la couche metier , ne pas faire de requête utilisé les membres des objets



function Attaquer($IdAgresseur, $IdVictime, $Bdd)
{

    $Agresseur = new entite($IdAgresseur, $Bdd);
    $Victime = new entite($IdVictime, $Bdd);

    $VictimePdv = $Victime->getPdv() - $Agresseur->getAttaque();
    $Victime->setPdv($VictimePdv);
    echo "<div> <p>Pdv du dragon :".$Victime->getPdv()."</p></div>";

    $Bdd->query("UPDATE `entite` SET `pdv` = " . $VictimePdv . " WHERE `entite`.`id_entite` = " . $Victime->getId() . "");
}

echo "<div><p>Appuyez sur f5 pour attaquer (je ferais un btn plus tard)<p><div>";

Attaquer(1, 2, $Bdd);


