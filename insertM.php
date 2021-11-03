<?php
require 'connect.inc.php';

$sql = "INSERT INTO matiere(codemat, libelle, coef) 
               VALUES('STAT', 'Statistique', 0.4), 
                     ('INF', 'Informatique', 0.4),
                     ('ECO', 'Economie', 0.2)";

//on stocke le nombre de ligne dans var row
$row = $dbh->exec($sql);

if ($row > 0) {
    echo "Vous avez inserés " . $row . " Ligne(s) dans la table matière";
};
