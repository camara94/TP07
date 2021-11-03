<?php require 'connect.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserer une une matière</title>
    <style>
        .container {
            width: 800px;
            margin: 10px auto;
        }

        label {
            display: inline-block;
            width: 30%;
        }

        input[type="text"] {
            padding: 5px;
            width: 65%;
        }

        input[type="submit"] {
            width: 200px;
            margin-left: 250px;
            padding: 10px;
            border-radius: 5px;
            background-color: lightgreen;
            color: white;
        }

        .pa {
            width: 800px;
            margin: 0px auto;
        }
    </style>
</head>

<body>
    <title>Inserer une une matière</title>
</body>

<div class="container">
    <h1>Ajouter une une epreuve</h1>
    <form method="POST">
        <p>
            <label for="codemat">NUMERO DE L'EPREUVE:</label>
            <input type="text" name="numepreuve" placeholder="Entrer le numéro" />
        </p>

        <p>
            <label for="codemat">DATE DE L'EPREUVE:</label>
            <input type="date" name="datepreuve" placeholder="Entrer la date" />
        </p>

        <p>
            <label for="codemat">LIEU DE L'EPREUVE:</label>
            <input type="text" name="lieu" placeholder="Entrer le lieu" />
        </p>

        <p>
            <label for="codemat">SELECTIONNER LA MATIERE(CODE DE LA MATIERE):</label>
            <select name="codemat">
                <?php
                // Ici je récupère le code et les libelle de toutes les matères de la base
                $sql = 'SELECT codemat, libelle FROM matiere';
                $result = $dbh->query($sql);
                var_dump($result);

                while ($row = $result->fetch()) {
                    echo '<option value="' . $row['codemat']  . '">' . $row['libelle'] . '</option>';
                }
                ?>
            </select>
        </p>

        <p>
            <input type="submit" value="Enrégistrer" />
        </p>
    </form>
</div>

</html>

<?php
// ICI NOUS ALLONS QUE TOUS LES CHAMPS SONT REMPLIS AVANT DE SOUMET LE FORMULAIRE
if (!empty($_POST['numepreuve']) && !empty($_POST['datepreuve']) && !empty($_POST['lieu']) && !empty($_POST['codemat'])) {

    $numepreuve = $_POST['numepreuve'];
    $datepreuve = $_POST['datepreuve'];
    $lieu = $_POST['lieu'];
    $codemat = $_POST['codemat'];

    /* Queston 4
    $sql = "INSERT INTO epreuve(numepreuve, datepreuve, lieu, codemat) 
               VALUES (" . $numepreuve . ",'" . $datepreuve . "','" . $lieu . "','" . $codemat . "')";

    //on stocke le nombre de ligne dans la variable row
    $row = $dbh->exec($sql);

    if ($row > 0) {
        echo '<p class="pa">Vous avez inserés ' . $row . ' Ligne(s) dans la table epreuve</p>';
    };*/

    // Question 5: Requete préparé
    $sql = "INSERT INTO epreuve(numepreuve, datepreuve, lieu, codemat) 
               VALUES (:numepreuve, :datepreuve, :lieu, :codemat)";
    $stmt = $dbh->prepare($sql);

    $stmt->bindParam(':numepreuve', $numepreuve);
    $stmt->bindParam(':datepreuve', $datepreuve);
    $stmt->bindParam(':lieu', $lieu);
    $stmt->bindParam(':codemat', $coef);
    $stmt->bindParam(':codemat', $codemat);

    if ($stmt->execute()) {
        echo '<p class="pa">Vous avez inserés 1 Ligne dans la table epreuve</p>';
    };

    //On rafraichit la page après soumission du formaulaire
    //header("Refresh:0;");
}
