<?php 
// Dev by FRESI 
//TODO les test unitaire de classe n'on pas besoin de formulaire
include("Hero.php");
include("../header.php");  
    $Perso1 = new Hero(1, $Bdd); 

    $Perso1->AfficherStats(1);
    echo $Perso1->AfficherArme();
    echo $Perso1->AfficherArmure();
?>