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

        <?php

        if($isconnect){
            echo"vous etes sur le site";

        }else{
            echo"vous devez vous identifiez";
        }
        
        ?>

        </body>
</html>

<?php
//$Perso1 = new Hero(0, $Bdd);


    include "./IHM/footer.php";
