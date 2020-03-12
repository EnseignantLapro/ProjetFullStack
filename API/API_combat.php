<?php include "../Metier/combat.php";

//traitement des données post et get 
//récupération des données du front
// par exemple le front peut envoyer 2 id de combatant

$id1 = 12222;
$id2 = 2222;

$Perso1 = new Personnage($id1);
$Perso2 = new Personnage($id2);

combat($Perso1,$Perso2);

$jsonretour = "{perso:'qddsq'{{ sjhqdqsdqd qd]]";

    echo $jsonretour;