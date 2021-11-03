<?php
$baseDeDonnees = "etudiants";
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";

try {
    $dbh = new PDO('mysql:host=' . $serveur . ';dbname=' . $baseDeDonnees, $utilisateur, $motDePasse);
    // pour activer la gestion des erreur en PDO ( mode exception)
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    print('Connexion réussie.');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
