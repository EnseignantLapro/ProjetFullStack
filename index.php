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
if ($connect == true) {
    echo "je suis connect";
} else if ($connect == false) {


}

$Perso1 = new Hero(0, $Bdd);

include "./IHM/footer.php";
