<?php 
// Dev by Wantelez
include("Hero.php");
include("../IHM/header.php");
?>

<form action="" method="POST"> 
    <input type="submit" name="attaquer" value="Clickez ici pour attaquer le Dragon !">
</form>


<?php
if(isset($_POST['attaquer'])){
$Attaque1 = new Hero(1, $Bdd);
$Attaque1->AttaqueMob(1);
$VieMob = $Attaque1->GetVieMob();
echo "<div> Points de vie du dragon : ".$VieMob."</div>";
}
?>




