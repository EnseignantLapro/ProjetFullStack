<?php $adresse="127.0.0.1"; 
$nomBase = "projetfullstack";
$userBase ="root";
$mdpBase="";

$Bdd = new PDO('mysql:host=' . $adresse . '; dbname='.$nomBase.'; charset=utf8', '' . $userBase . '', '' . $mdpBase . '');


?>