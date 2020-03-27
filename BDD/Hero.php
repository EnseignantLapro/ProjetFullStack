<?php
include "Entite.php";

class Hero extends entite
{
    private $_potion;

 public function showDefense()
    {
        $Defense = entite::GetDefense(2);
        echo "j'ai ".$Defense." de défense";
    }


}
include "../header.php";
$test = new Hero(0, $Bdd);
$test->showDefense();


$Attaque1 = new entite(2, $Bdd);
$Attaque1->Attaquer(3, $Attaque1->GetDefense(3));
