<?php include "../BDD/Entite.php";
      include "../BDD/combat.php";
      include "../BDD/Hero.php";

    
    

    $_POST['combat'] = 1;
    $_POST['idagresseur'] = 2;
    $_POST['idvictime'] = 3;
    $_POST['getnom'];
    
    $iddehero=2;
    $iddevictime=3;
    
    try
    {
        $bdd = new PDO('mysql:host=localhost; dbname=pfullstack; charset=utf8','root','');
    }
    catch(Exception $e)
    {
        echo "erreur connexion à la base";
    }

    if(isset($_POST['combat'])&&isset($_POST['idagresseur'])&&isset($_POST['idvictime']))
    {
        //prochainement : requete sql qui permettra d'identifier l'agresseur et la victime 

        if($_POST['idagresseur']== $iddehero) //si l'agresseur est un hero, j'instancie un hero
        {
            $persotamp1 = new Entite(1,$bdd);
        }

        if( $_POST['idvictime'] ==  $iddevictime)
        {

            $persotamp2 = new Entite(2,$bdd);
        }
      

        $persotemp1->Attaquer(1,2,$bdd); //le premier id est celui de l'agresseur, le second celui de la victime
       
         
        $viepersoattaquant =  $persotamp1->getPdv(); //on récupère la vie de l'entité attaquant et de l'entité attaquée, ce sont les informations à retourner
        $viepersovictime = $persotamp2->getPdv();
        $life = array('vie' => $vieperso1, 'vie2' => $vieperso2);

        //$jsonretour = "{_Vie:vieperso1,_Vie:vieperso2}";
        //echo $jsonretour;

        echo json_encode($life);
    }
    
    if(isset($_POST['getid'])&&isset($_POST['idperso1']))
    {
        //prochainement : requete sql qui récupèrera l'id du personnage en question

        $persotemp1= new Hero(4,$bdd);

        $id = $persotemp1->GetID(); 

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

        $nvpseudo = $persotemp1->SetPseudo($_POST['nouveaupseudo']);

        $tabpseudo = array('pseudo' => $nvpseudo);

        //$jsonretour = "{nouveaupseudo}";
        //echo $jsonretour;

        echo json_encode($tabpseudo);


    }






?>