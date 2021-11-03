<?php
require 'connect.inc.php';

$sql = "INSERT INTO epreuve(numepreuve, datepreuve, lieu, codemat) 
               VALUES (11031, '2003/12/15', 'Salle 191L','STA'),
                      (11032, '2004/04/01', 'Amphi G', 'STA'),
                      (21031, '2003/10/30', 'Salle 191L', 'INF'),
                      (21032, '2004/06/01', 'Salle 192L', 'INF'),
                      (31030, '2004/06/02', 'Salle 05R', 'ECO')";

//on stocke le nombre de ligne dans var row
$row = $dbh->exec($sql);

if ($row > 0) {
    echo "Vous avez inserés " . $row . " Ligne(s) dans la table epreuve";
};
