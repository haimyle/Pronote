<?php
session_start();
require_once "../../bdd/Bdd.php";
require_once "../../modele/Planning.php";

$bdd = new Bdd();

$planning = new Planning(array(
    'Date' => $_POST['date'],
    'HeureDebut' => $_POST['heure_debut'],
    'HeureFin' => $_POST['heure_fin'],
    'RefClasse' => $_POST['ref_classe'],
    'RefProfesseur' => $_POST['ref_professeur'],
    'RefMatiere' => $_POST['ref_matiere'],
));

$planning->createPlanning($bdd->getBdd());
var_dump($planning);