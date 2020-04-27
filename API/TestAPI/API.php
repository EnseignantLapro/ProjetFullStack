<?php 
        include "../../BDD/Entite.php";
        include "../../Metier/attaquer.php";
        
        
        
        

    
    // Dev By Mathis

    
   
  
    
   
    if(isset($_POST['combat'])&&isset($_POST['idagresseur'])&&isset($_POST['idvictime']))
    {
        if($_POST['combat']==1)
        {
            try
            {
                $bdd = new PDO('mysql:host=localhost; dbname=pfullstack; charset=utf8','root','');
                echo "reussi";
            }
            catch(Exception $e)
            {
                echo "erreur connexion à la base";
            }

            try
            {
                $idagresseur = $_POST['idagresseur'];
                $idvictime = $_POST['idvictime'];
                $dataagresseur = $Bdd->query('SELECT id_entite FROM entite where id_entite="'.$idagresseur.'"'); //on verifie si les deux entités demandées existent en base
                $tabagresseur = $dataagresseur->fetch();
                $idagresseur = $tabagresseur['id_entite'];

                $datavictime = $Bdd->query('SELECT id_entite FROM entite where id_entite="'.$idvictime.'"');
                $tabvictime = $datavictime->fetch();
                $idvictime = $tabvictime['id_entite'];

                $agresseur = new Entite($idagresseur,$Bdd);
                $victime = new Entite($idvictime,$Bdd);
               
                $agresseur->Attaquer($idagresseur,$idvictime,$Bdd); 
       
         
                $viepersoattaquant =  $agresseur->getPdv(); //on récupère la vie de l'entité attaquant et de l'entité attaquée, ce sont les informations à retourner
                $viepersovictime = $victime->getPdv();
                $life = array('vie' => $vieperso1, 'vie2' => $vieperso2);
                
                echo json_encode($life);
                //$jsonretour = "{_Vie:vieperso1,_Vie:vieperso2}";
                //echo $jsonretour;
            
            }
            catch(Exception $e)
            {
                echo "erreur, la ou les entités n'existe/existent pas";
            }
        }    
    }
    
    /*
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

*/




?>