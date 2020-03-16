<?php include "../BDD/API.php";

    $truc =1;
    

    $_POST['truc'] = $truc;
   

    if(isset($_POST['truc']))
    {
        $persotemp1= new Personnage("blabla");
        $persotemp2= new Personnage("lalaa");

        $persotemp1->attaque($persotemp2);
       
        $vieperso1 =  $persotemp1->getvie();
        $vieperso2 =  $persotemp2->getvie();
        

        $jsonretour = "{_Vie:vieperso1,_Vie:vieperso2}";
        
    }

?>