<?php
//pute
include "./IHM/header.php";
include "config.php";

/*if(isset($_GET['map'])){
        echo "vous êtes sur la map N°".$_GET['map'];

        echo 'go plus loin <a href="?map=768676">768676</a>';

    }else{
        echo "vous etes perdu ";
    }
*/
?>
<form method="post" action="">
    <h3>Log In</h3>
    <fieldset>
        <input type="text" name="email" placeholder="Adresse Mail" autofocus required>
        <input type="text" name="password" placeholder="Mot de passe" required>
    </fieldset>
    <fieldset>
        <form method="post" action="">
            <input class="button" type="submit" value="Se connecter">
        </form>
        <form method="post" action="">
            <input class="button" type="submit" value="S'inscrire">
        </form>
    </fieldset>
    <?php
    if ($connect == true) {
        echo "je suis connect";
    } else if ($connect == false) {
    }

//$Perso1 = new Hero(0, $Bdd);


    include "./IHM/footer.php";
