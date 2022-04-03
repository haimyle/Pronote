<?php
require_once 'Utilisateur.php';
class Professeur extends Utilisateur
{
    public function __construct(array $donnees)
    {
        parent::__construct($donnees);
    }

    public function seConnecter($bdd)
    {
        $req = $bdd->prepare("SELECT * FROM professeur WHERE email=:email AND password=:password");
        $req->execute(array(
            'email' => $this->email,
            'password' => $this->password
        ));
        $res = $req->fetch();
        if ($res) {
            $_SESSION['email'] = $res['email'];
            $_SESSION['password'] = $res['password'];
            $_SESSION['prenom'] = $res['prenom'];
            $_SESSION['nom'] = $res['nom'];
            $_SESSION['id'] = $res['id_professeur'];

            if ($res['role'] == "admin") {
                echo "<script>alert('Bienvenue!');
                window.location.href='../../vue/admin/homepage.php';</script>";
            } else {
                echo "<script>alert('Bienvenue!');
                window.location.href='../../vue/professeur/homepage.php';</script>";
            }

        } else {
            echo "<script>alert('Mauvais email ou mot de passe. Ressayez!');
                window.location.href='../../vue/role.php'</script>";
        }
    }
    public function createProf($bdd){
        $req = $bdd->prepare('SELECT * FROM professeur WHERE email = :email');
        $req->execute(array(
            'email' => $_POST['email']
        ));
        $res = $req->fetch();
        if ($res) {
            echo "<script>alert('Compte existant');
                window.location.href='#';</script>";
        } else {
            $req = $bdd->prepare("INSERT INTO professeur(nom, prenom, email, password) 
        VALUES (:nom, :prenom, :email, :password)");
            $res = $req->execute(array(
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'password' => $this->password
            ));

            if ($res) {
                echo "<script>alert('Succès!');
                window.location.href='../../vue/professeur/create.php';</script>";
            } else {
                echo "<script>alert('Erreur!');
                window.location.href='../../vue/professeur/create.php'</script>";
            }
        }
    }

    public function readProf($bdd){}
    public function updateProf($bdd){
        $req = $bdd->prepare("UPDATE professeur SET nom =:nom, prenom =:prenom,email =:email, password =:password WHERE id_professeur=:id_professeur");
        $res = $req->execute(array(
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'password' => $this->password,
            'id_professeur' => $this->id
        ));
        if ($res) {
            echo "<script>alert('Succès!');
                window.location.href='../../vue/professeur/choisirID.php';</script>";
        } else {
            echo "<script>alert('Erreur!');
                window.location.href='../../vue/professeur/choisirID.php';</script>";
        }

    }
    public function deleteProf($bdd){
        $req = $bdd->prepare("DELETE FROM professeur WHERE id_professeur=:id_professeur");
        $res = $req->execute(array(
            'id_professeur' => $this->id
        ));
        //var_dump($is_success);
        if ($res) {
            session_destroy();
            echo "<script>alert('Compte supprimé!');
                window.location.href='../../vue/professeur/delete.php';</script>";
        } else {
            echo "<script>alert('Erreur');
                window.location.href='../../vue/professeur/delete.php';</script>";
        }
    }



    public function createMatiere($bdd){}
    public function readMatiere($bdd){}
    public function updateMatiere($bdd){}
    public function deleteMatiere($bdd){}


}