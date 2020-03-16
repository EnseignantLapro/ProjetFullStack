<?php include "../BDD/API.php";

    $truc =1;
    $bidule =2;

    $_POST['truc'] = $truc;
    $_POST['machin'] = $bidule;

    if(isset($_POST['truc'])&&isset($_POST['machin']))
    {
        $persotemp1= new Personnage($_POST['truc'],..);
        $persotemp2= new Personnage($_POST['machin'],..);

        combat($persotemp1,$persotemp2);
    }

?>