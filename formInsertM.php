<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserer une une matière</title>
    <style>
        .container {
            width: 650px;
            margin: 10px auto;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        input[type="text"] {
            padding: 5px;
            width: 350px;
        }

        input[type="submit"] {
            width: 200px;
            margin-left: 200px;
            padding: 10px;
            border-radius: 5px;
            background-color: lightgreen;
            color: white;
        }

        .erreur {
            margin: 0px auto;
            width: 650px;
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>
    <title>Inserer une une matière</title>
</body>

<div class="container">
    <h1>Inserer une une matière</h1>
    <form method="POST">
        <p>
            <label for="codemat">CODE DE MATIERE:</label>
            <input type="text" name="codemat" placeholder="Entrer le code" />
        </p>

        <p>
            <label for="codemat">LIBELLE:</label>
            <input type="text" name="libelle" placeholder="Entrer le libellé" />
        </p>

        <p>
            <label for="codemat">COEFFICIENT:</label>
            <input type="text" name="coef" placeholder="Entrer le coeficient" />
        </p>

        <p>
            <input type="submit" value="Enrégistrer" />
        </p>
    </form>
</div>

</html>

<?php
// ICI NOUS ALLONS QUE TOUS LES CHAMPS SONT REMPLIS AVANT DE SOUMET LE FORMULAIRE
if (!empty($_POST['codemat']) && $_POST['libelle'] && $_POST['coef']) {
    require 'connect.inc.php';

    $codemat = $_POST['codemat'];
    $libelle = $_POST['libelle'];
    $coef = $_POST['coef'];

    // Question 2
    /*$sql = "INSERT INTO matiere(codemat, libelle, coef) 
               VALUES('" . $codemat . "', '" . $libelle . "'," . (float)$coef . ")";
        $row = $dbh->exec($sql);  
        
        if ($row > 0) {
            echo '<p class="pa">Vous avez inserés ' . $row . ' Ligne(s) dans la table matière</p>';
        };
    */

    // Question 5
    // les requetes préparés sql et bind param
    $sql = "INSERT INTO matiere(codemat, libelle, coef) 
                   VALUES(:codemat, :libelle, :coef)";

    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':codemat', $codemat);
    $stmt->bindParam(':libelle', $libelle);
    $stmt->bindParam(':coef', $coef);

    if ($stmt->execute()) {
        echo '<p class="pa">Vous avez inserés 1 Ligne dans la table matière</p>';
    };

    //On rafraichit la page après soumission du formaulaire

}
