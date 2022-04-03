<?php
session_start();
require_once "../../bdd/Bdd.php";
require_once "../../modele/Etudiant.php";

$bdd = new Bdd();

$etudiant = new Etudiant(array(
    'Email' => $_POST['email'],
    'Password' => $_POST['password']
));

$etudiant->seConnecter($bdd->getBdd());
var_dump($etudiant);