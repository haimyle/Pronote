<?php
require_once "../../bdd/Bdd.php";
require_once "../../modele/Etudiant.php";

$bdd = new Bdd();

$etudiant = new Etudiant(array(
    'Id' => $_POST['id_etudiant']
));
$etudiant->deleteEtu($bdd->getBdd());
