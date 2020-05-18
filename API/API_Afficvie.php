<?php include "../config.php";
      include "../BDD/Hero.php";


      $ida = 1;
      $idv = 2 ;

      try{ //connection a la basede donnée

            $Bdd = new PDO('mysql:host=' . $adresse . '; dbname=' . $nomBase . '; charset=utf8', '' . $userBase . '', '' . $mdpBase . '');
            
      } catch (Exception $e) {
            echo '<div class="error">Exception reçue : ',  $e->getMessage(), "</div>";
           
      }


      $attaque = new Entite($ida, $Bdd); //on envoie id de l'attaquant dans la class etitée pour etre traiter avec la connection a la bdd
      $victime = new Entite($idv, $Bdd);

      $vieattaque = $attaque->getPdv(); // on recupere la vien de l'attaquant grace a la class entitée 
      $vievictime = $victime->getPdv();

      $vie = array("La vie de l'attaquant " => $vieattaque, "Vie de la victime " =>$vievictime); //on insere la vie de l'attaquant est de la victime dans un tableau

      
      echo json_encode($vie); // on encode le tableau en json 

?>