<?php
//DEV BY GARNON
include("../../header.php");
include("../Arme.php");
$reqArme = $Bdd->query("SELECT * FROM arme");
$reqDel = $Bdd->query("SELECT * FROM arme");
?>
<!-- Choix du heros et choix de l'arme à équiper -->
<form action="" method="post">
    <select name="Listeheros">
        <?php
        $reqAssos = $Bdd->query("SELECT * FROM assochero WHERE id_user = 1");
        while ($info = $reqAssos->fetch()) {
            $reqHero = $Bdd->query('SELECT * FROM hero WHERE id_hero = ' . $info['id_hero'] . '');
            $heroinfo = $reqHero->fetch();
            $reqTypehero = $Bdd->query('SELECT * FROM typehero WHERE id_typehero = '.$heroinfo['id_typehero'].'');
            $typeheroinfo = $reqTypehero->fetch();
            echo "<option value=" . $info['id_hero'] . ">" . $typeheroinfo['nom'] . "</option>";
        } ?>
    </select>
    <select name="Listearmes">
        <?php
        while ($infoarme = $reqArme->fetch()) {
            echo "<option value=" . $infoarme['id_arme'] . ">" . $infoarme['nom'] . "</option>";
        } ?>
    </select>
    <input type="submit" name="submitArme">
</form>
<form action="" method="post">
    Nom de l'arme :
    <input type="text" name="nomCrea">
    Prix de l'arme :
    <input type="text" name="prixCrea">
    Durabilite de l'arme :
    <input type="text" name="durabiliteCrea">
    Degats de l'arme :
    <input type="text" name="degatsCrea">
    <input type="submit" name="submitCrea">
</form>
<form action="" method="post">
    <select name="listeDel">
        <?php
        while ($infoDel = $reqDel->fetch()) {
            echo "<option value=" . $infoDel['id_arme'] . ">" . $infoDel['nom'] . "</option>";
        } ?>
    </select>

    <input type="submit" name="submitDel">
</form>
<?php
// Equipement de l'arme
if (isset($_POST['submitArme'])) {
    $arme = new Arme($Bdd, $_POST['Listearmes'], 0);
    echo "Le nom de l'arme est : " . $arme->getNom() . ", elle coûte " . $arme->getPrix() . "€, elle fait " . $arme->getDegat() . " de dégats et est à " . $arme->getDurabilite() . "%";
    echo "<br>Arme équipée";
    $arme->equiperArme(1, $_POST['Listeheros']);
}
//Suppression de l'arme
if (isset($_POST['submitDel'])) {
    $armeDel = new Arme($Bdd, $_POST['listeDel'], 0);
    $armeDel->deleteArme();
}
// Creation de l'arme
if (isset($_POST['submitCrea'])  && !empty($_POST['nomCrea']) && !empty($_POST['prixCrea']) && !empty($_POST['durabiliteCrea']) && !empty($_POST['degatsCrea'])) {
    $armeCree = new Arme($Bdd, NULL, 1);
    echo "<br>Arme créée";
    $armeCree->createArme($_POST['nomCrea'], $_POST['prixCrea'], $_POST['durabiliteCrea'], $_POST['degatsCrea']);
}
?>