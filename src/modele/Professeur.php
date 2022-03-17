<?php

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
            $_SESSION['id_professeur'] = $res['id_professeur'];

            if ($res['role'] == "admin") {
                echo "<script>alert('Bienvenue!');
                window.location.href='#';</script>";
            } else {
                echo "<script>alert('Bienvenue!');
                window.location.href='#';</script>";
            }

        } else {
            echo "<script>alert('Mauvais email ou mot de passe. Ressayez!');
                window.location.href='#';</script>";
        }
    }
}