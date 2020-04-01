<?php
include "../../header.php";
include "../Hero.php";


$Entite = new Hero(1, $Bdd);
echo "<div>" . $Entite->getId() . "</div>";
echo "<div>" . $Entite->getNom() . "</div>";
echo "<div>" . $Entite->getPdv() . "</div>";
echo "<div>" . $Entite->getAttaque() . "</div>";
echo "<div>" . $Entite->getDefense() . "</div>";
echo "<div>" . $Entite->getEtat() . "</div>";
echo "Nouvelle stats :";

$Entite->setNom("Florian");
$Entite->SetPdv(1400);
$Entite->setAttaque(100);
$Entite->setDefense(50);
$Entite->setEtat(0);


echo "<div>" . $Entite->getId() . "</div>";
echo "<div>" . $Entite->getNom() . "</div>";
echo "<div>" . $Entite->getPdv() . "</div>";
echo "<div>" . $Entite->getAttaque() . "</div>";
echo "<div>" . $Entite->getDefense() . "</div>";
echo "<div>" . $Entite->getEtat() . "</div>";
