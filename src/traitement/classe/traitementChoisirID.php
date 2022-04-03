<?php
require_once "../../bdd/Bdd.php";
require_once "../../modele/Classe.php";

$bdd = new Bdd();
foreach ($_POST['classe'] as $key){
    $classe = new Classe(array(
        'Id' => $key,
        'RefProfesseur' => $_POST['id_professeur']
    ));
    $classe->affecterClasse($bdd->getBdd());
    var_dump($classe);
}