<?php

class Devoir
{
    private $id;
    private $nom;
    private $recap;
    private $ref_prof;

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

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getRecap()
    {
        return $this->recap;
    }

    public function setRecap($recap)
    {
        $this->recap = $recap;
    }

    public function creerDevoir ($bdd){
        $req = $bdd->prepare("SELECT * FROM devoir WHERE nom=:nom, recap =:recap, ref_professeur=:ref_professeur");
        $res = $req->execute(array(
            'nom' => $_POST['nom'],
            'recap' => $_POST['recap'],
            'ref_professeur' => $_POST['ref_professeur']
        ));
        $res = $req->fetch();
        if ($res) {
            echo "<script>alert('Devoir existant');
                window.location.href='../vue/#';</script>";
        }
        else {
            $req = $bdd->prepare("INSERT INTO devoir(nom, recap, ref_professeur) VALUES (:nom, :recap, :ref_professeur)");
            $res = $req->execute(array(
                'nom' => $this->nom,
                'recap' => $this->recap,
                'ref_professeur' => $this->ref_professeur
            ));
            if ($res) {
                echo "<script>alert('Devoir enregistrée');
                window.location.href='../vue/#';</script>";
            } else {
                echo "<script>alert('Erreur');
                window.location.href='../vue/#';</script>";
            }
        }
    }





}