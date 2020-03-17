<?php
require "../../BDD/Arme.php";
include "../../config.php";

//récupération de la liste des armes en BDD.



$Bdd = null;
try {
    $Bdd = new PDO('mysql:host=' . $adresse . '; dbname=' . $nomBase . '; charset=utf8', '' . $userBase . '', '' . $mdpBase . '');
    $connect = true;
    $DonneeBruteArme = $Bdd->query("SELECT * FROM arme");
    $TabArmeIndex = 0; //équivalent de [i] en C
    while ($tab = $DonneeBruteArme->fetch()) {

        $TabArme[$TabArmeIndex++] = new Arme($tab['id_arme'], $tab['nom_arme']);
    }
} catch (Exception $e) {
    echo '<div class="error">Exception reçue : ',  $e->getMessage(), "</div>";
    $connect = false;
}

//on simule une connexion tjs valide
$connect = true;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <nav>
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="#1" data-toggle="tab">Arme</a></li>
            <li role="presentation"><a href="#2" data-toggle="tab">Suppression Arme</a></li>

        </ul>
    </nav>
    <div class="tab-content">


        <div class="tab-pane active" class="Arme" id="1">


            <div class="row">


                <div class="text-center">
                    <h1>Choisis ton arme :</h1>
                    <FORM action="" method="POST">
                        <select name="arme" id="">

                            <?php
                            //parcours du tableau de User pour afficher les options de la liste déroulante
                            foreach ($TabArme as $objetArme) {
                                echo '<option value="' . $objetArme->getId() . '">' . $objetArme->getNom() . '</option>';
                            }
                            ?>
                        </select>
                        <input type="submit"></input>
                    </form>

                    <?php
                    if (isset($_POST["arme"])) {
                        //recherche de l'id dans le tableau de Arme
                        foreach ($TabArme as $objetArme) {
                            if ($objetArme->getId() == $_POST["arme"]) {
                                $objetArme->AfficheArme();
                            }
                        }
                    } else {
                        echo "Aucun Arme selectionné";
                    }
                    ?>
                </div>
            </div>
        </div>
        

        <div class="tab-pane" class="Arme" id="2">


            <div class="row">


                <div class="text-center">
                    <h1>Suppression Arme:</h1>
                    <FORM action="" method="POST">
                        <?php
                        foreach ($TabArme as $objetArme) {
                            echo '<p><input type="checkbox" value="' . $objetArme->getId() . '" name="Arme[]" />';
                            echo '<label for="coding">  ' .  $objetArme->getNom() . ' </label></p>';
                        }
                        ?>
                        <input type="submit" value="Supprimer"></input>
                    </FORM>

                    <?php
                    if (isset($_POST["Arme"])) {
                        foreach ($_POST['Arme'] as $idArme) {

                            $j = 0;
                            foreach ($TabArme as $objetArme) {
                                if ($objetArme->getId() == $idArme) {
                                    $objetArme->deleteArme();
                                   
                                    //j'en profite pour le retirer de mon tableau. car il sera supprimé à l'affichage
                                    unset($TabArme[$j]);
                                   
                                }
                                $j++;
                            }
                        }
                    }


                    ?>
                </div>
            </div>
        </div>
    </div>





</body>