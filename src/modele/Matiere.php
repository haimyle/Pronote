<?php

class Matiere
{
    private $id;
    private $nom;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function createMatiere($bdd){}
    public function readMatiere($bdd){}
    public function updateMatiere($bdd){}
    public function deleteMatiere($bdd){}
}