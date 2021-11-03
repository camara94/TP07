<?php require_once "connect.inc.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des matières</title>
    <style>
        h1 {
            color: #0071BD;
        }

        .container {
            width: 800px;
            margin: 0px auto;
        }

        th {
            background-color: #0071BD;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>La liste des Matières</h1>
        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th>CODE MATIERE</th>
                <th>LIBELLE</th>
                <th>COEFFICIENT</th>
                <th>Action</th>
            </tr>

            <?php
            // On recupère toutes les lignes et colonnes de la table matière
            $listMatieres = $dbh->query('SELECT * FROM matiere');
            //Je fais une bouble while pour parcourir tous les élement de ma table
            while ($ligne = $listMatieres->fetch()) {
            ?>
                <tr>
                    <td><?= $ligne['codemat'] ?></td>
                    <td><?= $ligne['libelle'] ?></td>
                    <td><?= $ligne['coef'] ?></td>
                    <td> <a href="suppM.php?codemat=<?= $ligne['codemat'] ?>" target="_blank">Suppression</a> </td>
                </tr>
            <?php } ?>

        </table>
    </div>
</body>

</html>