<?php
require "../../BDD/Arme.php";
include "../../config.php";

//récupération de la liste des armes en BDD + config de co.



$Bdd = null;
try {
    $Bdd = new PDO('mysql:host=' . $adresse . '; dbname=' . $nomBase . '; charset=utf8', '' . $userBase . '', '' . $mdpBase . '');
    $connect = true;
    //On récupere les armes dans un tableau
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

    <!-- Menu avec boostrap, #1 #2 #3 sont les onglets du menu -->

    <nav>
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="#1" data-toggle="tab">Arme</a></li>
            <li role="presentation"><a href="#2" data-toggle="tab">Suppression Arme</a></li>
            <li role="presentation"><a href="#3" data-toggle="tab">Craft</a></li>

        </ul>
    </nav>


    <!-- Choix de l'arme, onglet #1 -->
    <div class="tab-content">
        <div class="tab-pane active" class="Arme" id="1">
            <div class="row">
                <div class="text-center">
                    <div class="container">
                        <div class="row centered-form">
                            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h1 class="panel-title">Choisis ton arme :</h1>
                                    </div>
                                    <div class="panel-body">

                                        <FORM action="" method="POST">
                                            <select name="arme" id="">

                                                <?php
                                                //parcours du tableau d'Arme pour afficher les options de la liste déroulante
                                                foreach ($TabArme as $objetArme) {
                                                    echo '<option value="' . $objetArme->getId() . '">' . $objetArme->getNom() . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <input type="submit"></input>
                                        </form>

                                        <?php
                                        //traitement de la liste déroulante de l'arme a sélectionner 
                                        if (isset($_POST["arme"])) {
                                            //recherche de l'id dans le tableau de Arme
                                            foreach ($TabArme as $objetArme) {
                                                if ($objetArme->getId() == $_POST["arme"]) {
                                                    $objetArme->AfficheArme();//Appel de la méthode Affiche arme
                                                }
                                            }
                                        } else {
                                            echo "Aucun Arme selectionné";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Suppression des armes onglet #2 -->
        <div class="tab-pane" class="Arme" id="2">
            <div class="row">
                <div class="text-center">
                    <div class="text-center">
                        <div class="container">
                            <div class="row centered-form">
                                <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h1 class="panel-title">Suppression Arme:</h1>
                                        </div>
                                        <div class="panel-body">
                                            <FORM action="" method="POST">
                                                <?php
                                                 //parcours du tableau d'Arme pour delete a partir d'une checkbox
                                                foreach ($TabArme as $objetArme) {
                                                    echo '<p><input type="checkbox" value="' . $objetArme->getId() . '" name="Arme[]" />';
                                                    echo '<label for="coding">  ' .  $objetArme->getNom() . ' </label></p>';
                                                }
                                                ?>
                                                <input type="submit" value="Supprimer"></input>
                                            </FORM>

                                            <?php
                                            //Traitement checkbox pour delete l'arme sélectionner
                                            if (isset($_POST["Arme"])) {
                                                foreach ($_POST['Arme'] as $idArme) {

                                                    $j = 0;
                                                    foreach ($TabArme as $objetArme) {
                                                        if ($objetArme->getId() == $idArme) {
                                                            $objetArme->deleteArme();//Appel de la méthode pour delete arme

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
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Craft armes onglet #3 -->
        <div class="tab-pane" class="Arme" id="3">


            <div class="row">


                <div class="text-center">
                    <div class="container">
                        <div class="row centered-form">
                            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h1 class="panel-title">Craft ton arme:</h1>
                                    </div>
                                    <div class="panel-body">
                                         <!-- Formulaire dans le but de crafter une arme (pas fini)-->
                                        <FORM role="form" action="" method="POST">
                                            <input type="text" name="nomArme" placeholder="Nom de l'arme a crafter" />
                                            <input type="submit" value="Crafter"></input>
                                        </FORM>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    





</body>