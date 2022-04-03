<?php
require_once 'Utilisateur.php';
class Etudiant extends Utilisateur
{
    private $ref_classe;

    public function getRefClasse()
    {
        return $this->ref_classe;
    }

    public function setRefClasse($ref_classe): void
    {
        $this->ref_classe = $ref_classe;
    }



    public function __construct(array $donnees)
    {
        parent::__construct($donnees);
    }


    public function seConnecter($bdd)
    {
        $req = $bdd->prepare("SELECT * FROM etudiant WHERE email=:email AND password=:password");
        $req->execute(array(
            'email' => $this->email,
            'password' => $this->password
        ));
        $res = $req->fetch();
        var_dump($res);

        if ($res) {
            $_SESSION['email'] = $res['email'];
            $_SESSION['password'] = $res['password'];
            $_SESSION['prenom'] = $res['prenom'];
            $_SESSION['nom'] = $res['nom'];
            $_SESSION['id'] = $res['id_etudiant'];
            echo "<script>alert('Bienvenue!');
                window.location.href='../../vue/etudiant/homepage.php';</script>";
        } else {
            echo "<script>alert('Mauvais email ou mot de passe. Ressayez!');
                window.location.href='../../vue/role.php';</script>";
        }
    }

    public function createEtu($bdd){
        $req = $bdd->prepare('SELECT * FROM etudiant WHERE email = :email');
        $req->execute(array(
            'email' => $_POST['email']
        ));
        $res = $req->fetch();
        var_dump($res);
        if ($res) {
            echo "<script>alert('Compte existant');
                window.location.href='#';</script>";
        } else {
            $req = $bdd->prepare("INSERT INTO etudiant(nom, prenom, email, password,ref_classe) 
        VALUES (:nom, :prenom, :email, :password, :ref_classe)");
            $res = $req->execute(array(
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'password' => $this->password,
                'ref_classe' => $this->ref_classe
            ));
            if ($res) {
                echo "<script>alert('Compte etudiant enregistré');
                window.location.href='#';</script>";
            } else {
                echo "<script>alert('Erreur');
                window.location.href='#';</script>";
            }
        }
    }
    public function readEtu($bdd){}
    public function updateEtu($bdd){
        $req = $bdd->prepare("UPDATE professeur SET nom =:nom, prenom =:prenom,email =:email, password =:password WHERE id_etudiant=:id_etudiant");
        $res = $req->execute(array(
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'password' => $this->password,
            'id_etudiant' => $this->id
        ));
        if ($res) {
            echo "<script>alert('Succès!');
                window.location.href='../../vue/professeur/choisirID.php';</script>";
        } else {
            echo "<script>alert('Erreur!');
                window.location.href='../../vue/professeur/choisirID.php';</script>";
        }
    }
    public function deleteEtu($bdd){
        $req = $bdd->prepare("DELETE FROM etudiant WHERE id_etudiant=:id_etudiant");
        $res = $req->execute(array(
            'id_etudiant' => $this->id
        ));
        //var_dump($is_success);
        if ($res) {
            session_destroy();
            echo "<script>alert('Compte supprimé!');
                window.location.href='../../vue/etudiant/delete.php';</script>";
        } else {
            echo "<script>alert('Erreur');
                window.location.href='../../vue/etudiant/delete.php';</script>";
        }
    }
}