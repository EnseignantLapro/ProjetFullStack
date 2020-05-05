<?php include "../config.php";
      include "../BDD/Hero.php";


      $ida = 1;
      $idv = 2 ;

      try{

            $Bdd = new PDO('mysql:host=' . $adresse . '; dbname=' . $nomBase . '; charset=utf8', '' . $userBase . '', '' . $mdpBase . '');
            
      } catch (Exception $e) {
            echo '<div class="error">Exception reçue : ',  $e->getMessage(), "</div>";
           
      }
      /*
      $dataattaque = $Bdd->query('SELECT id_entite FROM entite where id_entite="'.$ida.'"'); //on verifie si les deux entités demandées existent en base
      $tabattaque = $dataattaque->fetch();



      $datavictime = $Bdd->query('SELECT id_entite FROM entite WHERE id_entite ="' .$idv.'"');
      $tabvictime = $datavictime->fetch();
      */


      $attaque = new Entite($ida, $Bdd);
      $victime = new Entite($idv, $Bdd);

      $vieattaque = $attaque->getPdv();
      $vievictime = $victime->getPdv();

      $vie = array("La vie de l'attaquant " => $vieattaque, "Vie de la victime " =>$vievictime);

      
      echo json_encode($vie);

?>