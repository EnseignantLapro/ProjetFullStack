<?php

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
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="IHM/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="IHM/index.css">
    </head>

    <body>

    <div class="container" align="center">
    <div class="col-lg-7 formulaire">

    <form method="post" action="">
    <p><h1>Projet Fullstack</h1></p>
    <fieldset>
        <div class="col-lg-12 mail"><p><input class="text" type="text" name="email" placeholder="Adresse Mail" autofocus required></p></div>
        <div class="col-lg-12 password"><p><input class="text" type="text" name="password" placeholder="Mot de passe" required></p></div>
    </fieldset>
    <fieldset>
    <div class="row">
    <div class="col-md-3">
    </div>
        <div class="col-md-1">
            <form method="post" action="">
            <input class="button" type="submit" value="Se connecter">
            </form>
        </div>
        <div class="col-md-1 offset-md-2">
            <form method="post" action="">
            <input class="button" type="submit" value="S'inscrire">
            </form>
        </div>
    </div>
    </fieldset>
   
    </div> 
    
    <?php
    if ($connect == true) {
        echo "<p><h1>je suis connecter</h1></p>";
    } else if ($connect == false) {
    }
    ?>
    </div>
   
    </body>



</html>

<?php
//$Perso1 = new Hero(0, $Bdd);


    include "./IHM/footer.php";
