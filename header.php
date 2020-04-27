<?php
//TODO gerer session

include "config.php";

echo "<div> header </div>";


$isconnect = false;

if (isset($_SESSION['Connect'])) {

  $isconnect = true;
} else {
  $isconnect = false;
}

$Bdd = null;
try {

  $Bdd = new PDO('mysql:host=' . $adresse . '; dbname=' . $nomBase . '; charset=utf8', '' . $userBase . '', '' . $mdpBase . '');
  $connect = true;
} catch (Exception $e) {
  echo '<div class="error">Exception reçue : ',  $e->getMessage(), "</div>";
  $connect = false;
}
    

//on simule une connexion tjs valide
//$connect = true; 
