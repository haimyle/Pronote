<?php

class Devoir
{
    private $id;
    private $titre;
    private $recapitulatif;
    private $deadline;
    private $ref_professeur;
    private $ref_matiere;
    private $ref_classe;

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

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }


    public function getRecapitulatif()
    {
        return $this->recapitulatif;
    }

    public function setRecapitulatif($recapitulatif): void
    {
        $this->recapitulatif = $recapitulatif;
    }

    public function getDeadline()
    {
        return $this->deadline;
    }

    public function setDeadline($deadline): void
    {
        $this->deadline = $deadline;
    }

    public function getRefProfesseur()
    {
        return $this->ref_professeur;
    }

    public function setRefProfesseur($ref_professeur): void
    {
        $this->ref_professeur = $ref_professeur;
    }

    public function getRefMatiere()
    {
        return $this->ref_matiere;
    }

    public function setRefMatiere($ref_matiere): void
    {
        $this->ref_matiere = $ref_matiere;
    }/**
 * @return mixed
 */
public function getRefClasse()
{
    return $this->ref_classe;
}
public function setRefClasse($ref_classe): void
{
    $this->ref_classe = $ref_classe;
}

    public function creerDevoir ($bdd){
        $req = $bdd->prepare("SELECT * FROM devoir WHERE titre=:titre, ref_matiere=:ref_matiere, ref_professeur=:ref_professeur");
        $req->execute(array(
            'titre' => $this->titre,
            'ref_matiere' => $this->ref_matiere,
            'ref_professeur' => $this->ref_professeur
        ));
        $res = $req->fetch();
        if ($res) {
            echo "<script>alert('Devoir existant');
                window.location.href='../vue/devoir/create.php';</script>";
        }
        else {
            $req = $bdd->prepare("INSERT INTO devoir(titre, recapitulatif, deadline, ref_professeur, ref_matiere, ref_classe)
 VALUES (:titre, :recapitulatif, :deadline, :ref_professeur, :ref_matiere, :ref_classe)");
            $res = $req->execute(array(
                'titre' => $this->titre,
                'recapitulatif' => $this->recapitulatif,
                'deadline' => $this->deadline,
                'ref_professeur' => $this->ref_professeur,
                'ref_matiere' => $this->ref_matiere,
                'ref_classe' => $this->ref_classe
            ));
            if ($res) {
                echo "<script>alert('Succès');
                //window.location.href='../vue/devoir/create.php';</script>";
            } else {
                echo "<script>alert('Erreur');
                //window.location.href='../vue/devoir/create.php';</script>";
            }
        }
    }
    public function UpdateDevoir($bdd){
        $req = $bdd->prepare("UPDATE devoir SET titre =:titre, recapitulatif =:recapitulatif, deadline =:deadline,
                  ref_professeur =: ref_professeur, =:ref_matiere, ref_classe=:ref_classe");
        $res = $req->execute(array(
            'titre' => $this->titre,
            'recapitulatif' => $this->recapitulatif,
            'deadline' => $this->deadline,
            'ref_professeur' => $this->ref_professeur,
            'ref_matiere' => $this->ref_matiere,
            'ref_classe' => $this->ref_classe
        ));
        if ($res) {
            echo "<script>alert('Succès!');
                //window.location.href='../../vue/professeur/choisirID.php';</script>";
        } else {
            echo "<script>alert('Erreur!');
                //window.location.href='../../vue/professeur/choisirID.php';</script>";
        }

    }

    public function DeleteDevoir($bdd){
        $req = $bdd->prepare("DELETE FROM devoir WHERE id_devoir=:id_devoir");
        $res = $req->execute(array(
            'id_devoir' => $this->id
        ));
        if ($res) {
            echo "<script>alert('Succès!');
                //window.location.href='../../vue/etudiant/delete.php';</script>";
        } else {
            echo "<script>alert('Erreur');
                //window.location.href='../../vue/etudiant/delete.php';</script>";
        }
    }





}