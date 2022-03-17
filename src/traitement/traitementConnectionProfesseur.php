<?php
session_start();
require_once "../bdd/Bdd.php";
require_once "../modele/Professeur.php";

$bdd = new Bdd();

$professeur = new Professeur(array(
    'Email' => $_POST['email'],
    'Password' => $_POST['password']
));
$professeur->seConnecter($bdd->getBdd());