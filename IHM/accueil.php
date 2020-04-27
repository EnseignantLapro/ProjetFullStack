<?php
include "../config.php";
include "../header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="IHM/index.css">
    <title>Accueil</title>
</head>

<body>
    <div class="w-100 p-3 nav justify-content-center">
        <h2>Avant de commencer choisissez un Pseudo et un Champion</h2>
    </div>

    <div class="container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Veuillez saisir votre Pseudo</label>
                <input type="text" class="form-control" name="pseudo" required />
            </div>
            <div>
                <label class="my-1 mr-2 ">Selectionner Votre Champion</label>
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option selected>Champion 1</option>
                    <option value="1">Champion 2</option>
                    <option value="2">Champion 3</option>
                    <option value="3">Champion 4</option>
                </select>
            </div>

            <div class="w-100 p-4 nav justify-content-center">
                <button type="submit" class=" btn-lg btn btn-danger">Jouer</button>
            </div>

        </form>

        <?php
            //TODO php pour le traitement du formulaire

        ?>

    </div>
    <?php
    include "../footer.php"
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>