<?php 
// Dev by FRESI
include("Hero.php");
include("../header.php");  
    $Perso1 = new Hero(1, $Bdd); 

    $Perso1->AfficherStats(1);
    echo $Perso1->AfficherArme();
    echo $Perso1->AfficherArmure();
?>