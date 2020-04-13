<?php require("./BDD/connexion.php");
require "./header.php"; ?>

<html>

<head>

</head>

<body>
    <div class="container" align="center">
        <div class="row">

            <div class="col-lg-12 fullstack">
                <h1>Projet Fullstack</h1>
            </div>

            <div class="col-lg-5 connexion" align="center">
                <div class="col-xs-12" align="center">

                    <h1 id="modif2">Vous connectez</h1>
                    <form action="" method="POST">
                        <p><label>
                                <h3>Adresse Mail</h3>
                            </label>
                            <input type="text" name="NDC_2" class="text" /></p>
                        <p><label>
                                <h3>Mot De Passe</h3>
                            </label>
                            <input type="password" name="MDP_2" class="text" /></p>
                        <p> </p>
                        <input type="submit" name="lien1" value="connexion" class="button" />
                    </form>

                    <?php
                    if (!empty($_POST['NDC_2']) && !empty($_POST['MDP_2'])) {

                        $user = new user($Bdd);
                        $user->usersConnexion($_POST['NDC_2'], $_POST['MDP_2']);
                        $isconnectUS = $user->Compar2($_POST['NDC_2'], $_POST['MDP_2']);
                        if ($isconnectUS) {

                            echo "<p><h3>vous etes connectez.</h3></p>";

                            $_SESSION['Connect'] = true;

                    ?><p><input type="button" name="lien1" value="redirection" onclick="self.location.href=''" style="background-color:#3cb371" style="color:white; font-weight:bold" onclick class="bouton"></p><?php

                                                                                                                                                                                                                } else {

                                                                                                                                                                                                                    echo "<p><h3>Identifiants ou mot de passe incorrects, veuillez reessayer.</h3></p>";
                                                                                                                                                                                                                }
                                                                                                                                                                                                            }
                                                                                                                                                                                                                    ?>

                </div>
            </div>

            <div class="col-lg-2">
            </div>

            <div class="col-lg-5 inscription" align="center">
                <div class="col-xs-12" align="center">

                    <h1 id="modif1">Creer votre compte</h1>
                    <form action="" method="POST">
                        <p><label>
                                <h3>Pseudo</h3>
                            </label>
                            <input type="text" name="pseudo_1" class="text" /></p>
                        <p><label>
                                <h3>Adresse Mail</h3>
                            </label>
                            <input type="text" name="mail_1" class="text" /></p>
                        <p><label>
                                <h3>Mot De Passe</h3>
                            </label>
                            <input type="password" name="MDP_1" class="text" /></p>
                        <p> </p>
                        <input type="submit" name="valider1" value="s'inscrire" class="button" />
                    </form>

                    <?php
                    if (empty($_POST['pseudo_1']) && empty($_POST['mail_1']) && empty($_POST['MDP_1'])) {
                    } else {

                        $user = new user($Bdd);
                        $user->UsersNew($_POST['pseudo_1'], $_POST['mail_1'], $_POST['MDP_1']);
                        echo "<p><h3>nouvelle utilisateur creer veuillez renter a nouveau vos identifiants.</h3></p>";
                    }
                    ?>

                </div>
            </div>

            <div class="col-lg-12 presentation">
                salut ca va
            </div>

        </div>
    </div>
</body>

</html>