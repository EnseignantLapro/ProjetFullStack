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
<div class="row">

    <div class="col-lg-12 fullstack">
        <h1>Projet Fullstack</h1>
    </div>

    <div class="col-lg-5 connexion" align="center">
        <div class="col-xs-12" align="center">
            
                <h1 id="modif2">Vous connectez</h1>
                    <form action="index.php" method="POST"> 
                    <p><label><h3>Adresse Mail</h3></label>
                    <input type="text" name="NDC_2" class="text"/></p>
                    <p><label><h3>Mot De Passe</h3></label>
                    <input type="password" name="MDP_2" class="text"/></p>
                    <p> </p>
                    <input type="submit" name="valider2" value="connexion" class="button"/>
                    </form>
           
        </div>
    </div>

    <div class="col-lg-2">
    </div>

    <div class="col-lg-5 inscription" align="center">
        <div class="col-xs-12" align="center">
            
                <h1 id="modif1">Creer votre compte</h1> 
                    <form action="index.php" method="POST"> 
                    <p><label><h3>Pseudo</h3></label>
                    <input type="text" name="NDC_1" class="text"/></p>
                    <p><label><h3>Adresse Mail</h3></label>
                    <input type="text" name="NDC_1" class="text"/></p>
                    <p><label><h3>Mot De Passe</h3></label>
                    <input type="password" name="MDP_1" class="text"/></p>
                    <p> </p>
                    <input type="submit" name="valider1" value="s'inscrire" class="button"/>
                    </form>
            
        </div>
    </div>

    <div class="col-lg-12 presentation">
        salut ca va
    </div>

</div>
</div>

    </body>
</html>

<?php
//$Perso1 = new Hero(0, $Bdd);


    include "./IHM/footer.php";
