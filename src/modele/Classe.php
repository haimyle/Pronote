<?php

class Classe
{
    private $id;
    private $classe;
    private $ref_professeur;

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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getClasse()
    {
        return $this->classe;
    }

    public function setClasse($classe): void
    {
        $this->classe = $classe;
    }

    public function getRefProfesseur()
    {
        return $this->ref_professeur;
    }

    public function setRefProfesseur($ref_professeur): void
    {
        $this->ref_professeur = $ref_professeur;
    }

    public function affecterClasse($bdd){
        $req = $bdd->prepare("INSERT INTO classeprofesseur(ref_classe, ref_professeur) 
        VALUES (:ref_classe, :ref_professeur)");
        $res = $req->execute(array(
            'ref_classe' => $this->id,
            'ref_professeur' => $this->ref_professeur
        ));
        if ($res) {
            echo "<script>alert('Succès!');
                //window.location.href='../../vue/classe/affecter.php';</script>";
        } else {
            echo "<script>alert('Erreur!');
                //window.location.href='../../vue/classe/affecter.php'</script>";
        }
    }
    public function professeurClasse($bdd){
        $req = $bdd->prepare("SELECT FROM classeprofesseur(ref_classe, ref_professeur) 
        VALUES (:ref_classe, :ref_professeur)");
        $res = $req->execute(array(
            'ref_classe' => $this->id,
            'ref_professeur' => $this->ref_professeur
        ));
        if ($res) {
            echo "<script>alert('Succès!');
                //window.location.href='../../vue/classe/affecter.php';</script>";
        } else {
            echo "<script>alert('Erreur!');
                //window.location.href='../../vue/classe/affecter.php'</script>";
        }
    }


}