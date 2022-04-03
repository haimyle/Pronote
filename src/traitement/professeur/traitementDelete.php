<?php
require_once "../../bdd/Bdd.php";
require_once "../../modele/Professeur.php";

$bdd = new Bdd();

$professeur = new Professeur(array(
    'Id' => $_POST['id_professeur']
));
$professeur->deleteProf($bdd->getBdd());
