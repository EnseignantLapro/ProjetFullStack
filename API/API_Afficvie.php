<?php include "../config.php";
      include "../BDD/Hero.php";


      $ida = 1;
      $idv = 2 ;

      try{

            $Bdd = new PDO('mysql:host=' . $adresse . '; dbname=' . $nomBase . '; charset=utf8', '' . $userBase . '', '' . $mdpBase . '');
            
      } catch (Exception $e) {
            echo '<div class="error">Exception reçue : ',  $e->getMessage(), "</div>";
           
      }


      $attaque = new Entite($ida, $Bdd);
      $victime = new Entite($idv, $Bdd);

      $vieattaque = $attaque->getPdv();
      $vievictime = $victime->getPdv();

      $vie = array("La vie de l'attaquant " => $vieattaque, "Vie de la victime " =>$vievictime);

      
      echo json_encode($vie);

?>