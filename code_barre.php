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
            $errMsg = "vous devez saisir une suite de 12 chiffres";
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
        <title>Calcul de la clé d'un code barre</title>
    </head>

    <body>
        <h1>Calcul de la clé d'un code barre</h1>
        <form method="POST">
            <label for="barCode">Saississez les 12 premiers chiffres de votre code barre : </label>
            <input type="text" id="barCode" name="barCode" />
            <input type="submit" value="Ok">
        </form>
        <p><?= $errMsg ?></p>
        <p>votre saisie : <?= $barCode ?></p>
        <p>votre clé de code barre : <?= $barCodeKey ?></p>

        <p>votre code barre : <?= $barCode." ". $barCodeKey ?></p>

    </body>
</html>


