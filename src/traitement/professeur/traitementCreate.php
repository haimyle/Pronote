<?php
require_once "../../bdd/Bdd.php";
require_once "../../modele/Professeur.php";

$bdd = new Bdd();

$professeur = new Professeur(array(
    'Nom' => $_POST['nom'],
    'Prenom' => $_POST['prenom'],
    'Email' => $_POST['email'],
    'Password' => $_POST['password']
));
$professeur->createProf($bdd->getBdd());
