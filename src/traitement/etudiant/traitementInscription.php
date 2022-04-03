<?php
session_start();
require_once "../../bdd/Bdd.php";
require_once "../../modele/Etudiant.php";

$bdd = new Bdd();

$etudiant = new Etudiant(array(
    'Nom' => $_POST['nom'],
    'Prenom' => $_POST['prenom'],
    'Email' => $_POST['email'],
    'Password' => $_POST['password'],
    'RefClasse' => $_POST['ref_classe'],
));

$etudiant->createEtu($bdd->getBdd());
var_dump($etudiant);