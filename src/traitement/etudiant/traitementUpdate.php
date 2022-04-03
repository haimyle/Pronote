<?php
require_once "../../bdd/Bdd.php";
require_once "../../modele/Etudiant.php";

$bdd = new Bdd();

$etudiant = new Etudiant(array(
    'Id' => $_POST['id_etudiant'],
    'Nom' => $_POST['nom'],
    'Prenom' => $_POST['prenom'],
    'Email' => $_POST['email'],
    'Password' => $_POST['password']
));
$etudiant->updateEtu($bdd->getBdd());