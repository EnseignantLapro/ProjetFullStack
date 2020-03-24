<?php
//DEV BY GARNON
include("../header.php");
include("Arme.php");
?>
    <!-- Choix du heros et choix de l'arme à équiper -->
    <form action="" method="post">
        <select name="Listeheros">
            <?php
            $reqAssos = $Bdd->query("SELECT * FROM assoshero WHERE id_user = 1");
            while ($info = $reqAssos->fetch()) {
                $reqHero = $Bdd->query('SELECT * FROM typehero WHERE id_hero = ' . $info['id_hero'] . '');
                $heroinfo = $reqHero->fetch();
                echo "<option value=" . $info['id_hero'] . ">" . $heroinfo['nom'] . "</option>";
            } ?>
        </select>
        <select name="Listearmes">
            <?php
            $reqArme = $Bdd->query("SELECT * FROM arme");
            while ($infoarme = $reqArme->fetch()) {
                echo "<option value=" . $infoarme['id_arme'] . ">" . $infoarme['nom'] . "</option>";
            } ?>
        </select>
        <input type="submit" name="submitArme">
    </form>
<?php
// Equipement de l'arme
if (isset($_POST['submitArme'])) {
    $arme = new Arme($Bdd, $_POST['Listearmes']);
    echo "Le nom de l'arme est : " . $arme->getNom() . ", elle coûte " . $arme->getPrix() . "€ et elle fait " . $arme->getDegat() . " de dégats";
    echo "<br>Arme équipée";
    $arme->equiperArme(1, $_POST['Listeheros']);
}
?>