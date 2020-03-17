<?php
include "../../BDD/Personnage.php";
echo "lance le test";
echo "création du  user";
try {
    $Perso1 = new Personnage();
}catch(Exception $e){
    echo "test KO objet non creer";
}

echo "test de la méthode afficher info";
try {
    $Perso1->afficherInfo();
}catch(Exception $e){
    echo "test KO méthode afficherInfo";
}




?>