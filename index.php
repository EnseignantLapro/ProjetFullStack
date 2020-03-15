<?php 
    
    include "./IHM/header.php";

// Changement du code pour un test
// 2ème push pour un test 
    if(isset($_GET['map'])){
        echo "vous êtes sur la map N°".$_GET['map'];

        echo 'go plus loin <a href="?map=768676">768676</a>';

    }else{
        echo "vous etes perdu";
    }
    
    if ($connect == true){
        echo "je suis connect" ;
    }

    $Perso1 = new Personnage();

    echo $Base;


    


    include "./IHM/footer.php";




?>