<?php
    // initialisation des variables
    $barCode = "303792016200";
    $sum = 0;
    // parcourt la suite de chiffre du code barre
    for ($i = 0; $i<strlen($barCode); $i++) {
        // si l'itération est paire
        if($i%2) {
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
    $sumModulus = $sum%10;

    // si le modulo de la somme = 0
    if($sumModulus === 0) {
        // la clé du code barre  = 0
        $barCodeKey = 0;
    //sinon
    } else {
        //la clé du code barre = 10 - modulo de la somme
        $barCodeKey = 10 - $sumModulus;
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
        <p>votre code barre : <?= $barCode ?></p>
        <p>votre clé de code barre : <?= $barCodeKey ?></p>

    </body>
</html>


