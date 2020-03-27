<?php
// Dev by Wantelez
include("Hero.php");
include("../header.php");
?>

<form action="" method="POST">
    <input type="submit" name="attaquer" value="Clickez ici pour attaquer le Dragon !">
</form>


<?php


// Appel la fonction attaquer Dragon lorsque qu'on appui sur le bouton et qui lui soustrait 20hp
if (isset($_POST['attaquer'])) {
    $Attaque1 = new Hero(1, $Bdd);
    $Attaque1->AttaqueMob(1);

}

// Appel la fonction resetHp qui permet lorsqu'on appui sur le bouton de remettre les hp du dragon à 100
if (isset($_POST['reset'])) {

    $MobHp = new Hero(1, $Bdd);
    $MobHp->ResetHp(1);
}

$Attaque1 = new Hero(1, $Bdd);
$VieMob = $Attaque1->GetVieMob();
echo "<div> Points de vie du dragon : " . $VieMob . "</div>";
if ($VieMob == 0){
    echo "<div> Bravo vous avez tué le dragon ! soigner le maintenant le pauvre roh !!!</div>";
}
?>
<style>
.btn {

    margin-top:5%;
}
</style>
<div class="btn">
<form action="" method="POST">
    <input type="submit" name="reset" value="Soigner le dragon !">
</form>
</div>

