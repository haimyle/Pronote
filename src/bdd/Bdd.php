<?php

class Bdd
{
    private $bdd;

    function __construct(){
        try
        {
            $this->bdd = new PDO('mysql:host=localhost;dbname=hme_php_pronote;charset=utf8', 'root', '');
        }
        catch (Exception $e){die('Erreur : ' . $e->getMessage());}
    }

    public function getBdd()
    {
        return $this->bdd;
    }


}