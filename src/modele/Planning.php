<?php

class Planning
{
    private $id;
    private $date;
    private $heure_debut;
    private $heure_fin;
    private $ref_classe;
    private $ref_professeur;
    private $ref_matiere;

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

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getHeureDebut()
    {
        return $this->heure_debut;
    }

    public function setHeureDebut($heure_debut): void
    {
        $this->heure_debut = $heure_debut;
    }

    public function getHeureFin()
    {
        return $this->heure_fin;
    }

    public function setHeureFin($heure_fin): void
    {
        $this->heure_fin = $heure_fin;
    }

    public function getRefClasse()
    {
        return $this->ref_classe;
    }

    public function setRefClasse($ref_classe): void
    {
        $this->ref_classe = $ref_classe;
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
    }

    public function createPlanning($bdd){
        $req = $bdd->prepare('SELECT * FROM planning WHERE date =:date, heure_debut =:heure_debut, heure_fin =:heure_fin');
        $req->execute(array(
            'date' => $_POST['date'],
            'heure_debut' => $_POST['heure_debut'],
            'heure_fin' => $_POST['heure_fin']
        ));
        $res = $req->fetch();
        if ($res) {
            echo "<script>alert('Bloc heure occupé');
                window.location.href='../../vue/planning/create.php';</script>";
        } else {
            $req = $bdd->prepare("INSERT INTO bloc_heure(date, heure_debut, heure_fin, ref_classe, ref_professeur, ref_matiere) 
        VALUES (:date, :heure_debut, :heure_fin, :ref_classe, :ref_professeur, :ref_matiere)");
            $res = $req->execute(array(
                'date' => $this->date,
                'heure_debut' => $this->heure_debut,
                'heure_fin' => $this->heure_fin,
                'ref_classe' => $this->ref_classe,
                'ref_professeur' => $this->ref_professeur,
                'ref_matiere' => $this->ref_matiere,
            ));
            if ($res) {
                echo "<script>alert('Succès!');
                window.location.href='../../vue/planning/create.php';</script>";
            } else {
                echo "<script>alert('Erreur!');
                window.location.href='../../vue/planning/create.php'</script>";
            }
        }
    }
    public function readPlanning($bdd){
    }
    public function updatePlanning($bdd){
        $req = $bdd->prepare("UPDATE bloc_heure SET date =:date, heure_debut =:heure_debut,heure_fin =:heure_fin,
                      ref_classe =:ref_classe, ref_professeur=:ref_professeur, ref_matiere:=ref_matiere WHERE id_bh=:id_bh");
        $res = $req->execute(array(
            'date' => $this->date,
            'heure_debut' => $this->heure_debut,
            'heure_fin' => $this->heure_fin,
            'ref_classe' => $this->ref_classe,
            'ref_professeur' => $this->ref_professeur,
            'ref_matiere' => $this->ref_matiere,
            'id_bh' => $this->id
        ));
        if ($res) {
            echo "<script>alert('Succès!');
                window.location.href='../../vue/planning/choisirID.php';</script>";
        } else {
            echo "<script>alert('Erreur!');
                window.location.href='../../vue/planning/choisirID.php';</script>";
        }

    }
    public function deletePlanning($bdd){}





}