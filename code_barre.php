<?php
    // initialisation des variables
    $sum = 0;
    $barCode = "";
    $barCodeKey = "";
    $errMsg = "";

    // teste les données récupérées par le formulaire
    if (isset($_POST['barCode'])) {
        // teste si la saisie est bien constituée de 12 chiffres
        if (preg_match("#^[0-9]{12}$#", $_POST['barCode'])) {
            $barCode = $_POST['barCode'];
        } else {
            $errMsg = "Vous devez saisir une suite de 12 chiffres";
            $barCode = "";
        }
    } else {
        $barCode = "";
    }

// teste si le code barre existe
    if ($barCode !== "") {
                // parcourt la suite de chiffre du code barre
        for ($i = 0; $i < strlen($barCode); $i++) {
            // si l'itération est paire
            if ($i % 2) {
                //  somme = somme + le chiffre de l'itération * 3
                $sum = $sum + ($barCode[$i] * 3);;
                //sinon
            } else {
                //  somme = somme + le chiffre de l'itération * 3
                $sum = $sum + $barCode[$i];
            }
            // fin de condition
        }
        //fin de parcours
        //Modulo de la somme = somme modulo 10
        $sumModulus = $sum % 10;

        // si le modulo de la somme = 0
        if ($sumModulus === 0) {
            // la clé du code barre  = 0
            $barCodeKey = 0;
            //sinon
        } else {
            //la clé du code barre = 10 - modulo de la somme
            $barCodeKey = 10 - $sumModulus;
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Calcul de la clé d'un code barre</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <h1 class="text-center">Calcul de la clé d'un code barre</h1>
            <hr />
            <form method="POST" class="form-inline">
                <div class="form-group">
                    <label for="barCode">Saississez les 12 premiers chiffres de votre code barre :&nbsp</label>
                    <input type="text" id="barCode" name="barCode" class="form-control" />
                    <input type="submit" class="btn btn-primary" value="Ok">
                </div>
            </form>
            <p class="alert-danger"><?= $errMsg ?></p>
            <p>votre saisie : <?= $barCode ?></p>
            <p>votre clé de code barre : <?= $barCodeKey ?></p>
            <p>votre code barre : <?= $barCode." ". $barCodeKey ?></p>
        </div>
    </body>
</html>


