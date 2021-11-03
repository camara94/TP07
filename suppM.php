<?php
require 'connect.inc.php';

$codemat = $_GET['codemat'];

$sql = "DELETE FROM matiere WHERE codemat='" . $codemat . "'";

//on stocke le nombre de ligne dans var row
$row = $dbh->exec($sql);

if ($row > 0) {
    echo "Vous avez supprimé " . $row . " Ligne(s) dans la table epreuve";
    header("Refresh:0;url=afficheM.php");
};
