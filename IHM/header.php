<?php 
//session
include "./BDD/Hero.php";
//vous devez creer config.php avec les info suivantes :
/*
 $adresse="127.0.0.1"; 
$nomBase = "projetfullstack";
$userBase ="root";
$mdpBase="";
 */


include "./config.php";
echo "header";
/*
$Bdd = null;
try{

    $Bdd = new PDO('mysql:host=' . $adresse . '; dbname='.$nomBase.'; charset=utf8', '' . $userBase . '', '' . $mdpBase . '');
    $connect = true;
}Catch(Exception $e){
        echo '<div class="error">Exception reçue : ',  $e->getMessage(), "</div>";
        $connect = false;

    }
*/
//on simule une connexion tjs valide
$connect = true;

