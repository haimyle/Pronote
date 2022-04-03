<?php
session_start();
require_once "../../bdd/Bdd.php";
require_once "../../modele/Devoir.php";
require_once "../../modele/Professeur.php";


$bdd = new Bdd();

$devoir = new Devoir(array(
    'Titre' => $_POST['titre'],
    'Recapitulatif' => $_POST['recapitulatif'],
    'Deadline'=>$_POST['deadline'],
    'RefMatiere' => $_POST['matiere'],
    'RefProfesseur' => $_SESSION['id'],
    'RefClasse'=>$_POST['classe']

));
var_dump($devoir);
$devoir->creerDevoir($bdd->getBdd());