<?php include "../BDD/Hero.php";
      

    
    

    $_POST['combat'] = 1;
    $_POST['idperso1'] = 2;
    $_POST['idperso2'] = 3;
    $bdd=null;
   

    if(isset($_POST['combat'])&&isset($_POST['idperso1'])&&isset($_POST['idperso2']))
    {
        //prochainement : requete sql qui récupèrera les infos des deux persos qui se battent 

        $persotemp1= new Hero(3,$bdd);
        $persotemp2= new Hero(2,$bdd);

        $persotemp1->AttaqueMob($persotemp2); //le premier id est celui de l'agresseur 
       
        $vieperso1 =  $persotemp1->getvie(); //on récupère la vie des deux personnages, ce sont les informations à retourner
        $vieperso2 =  $persotemp2->getvie();
        
        $life = array('vie1' => $vieperso1, 'vie2' => $vieperso2);

        //$jsonretour = "{_Vie:vieperso1,_Vie:vieperso2}";
        //echo $jsonretour;

        echo json_encode($life);
    }
    
    if(isset($_POST['getid'])&&isset($_POST['idperso1']))
    {
        //prochainement : requete sql qui récupèrera l'id du personnage en question

        $persotemp1= new Hero(4,$bdd);

        $id = GetID(); 

        $tabid = array('idperso' => $id);

        //$jsonretour = "{_Id:id}";
        //echo $jsonretour;

        echo json_encode($tabid);


    }

    if(isset($_POST['afficherstat'])&&isset($_POST['idperso1']))
    {
        //prochainement : requete sql qui récupèrera les l'id du personnage en question pour avoir toutes ses infos

        $persotemp1= new Hero(6,$bdd);

        $chainearenvoyer= $persotemp1->AfficherStats(); 

        $chaine = array('stats' => $chainearenvoyer);

        //$jsonretour = "{chainearenvoyer}";
        //echo $jsonretour;

        echo json_encode($chaine);



    }

    if(isset($_POST['setpseudo'])&&isset($_POST['idperso1'])&&isset($_POST['nouveaupseudo']))
    {
        //prochainement : requete sql qui récupèrera l'id du personnage en question pour avoir son pseudo

        $persotemp1= new Hero(5,$bdd);

        $nvpseudo = SetPseudo($_POST['nouveaupseudo']);

        $tabpseudo = array('pseudo' => $nvpseudo);

        //$jsonretour = "{nouveaupseudo}";
        //echo $jsonretour;

        echo json_encode($tabpseudo);


    }






?>