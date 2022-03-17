<?php

abstract class Utilisateur
{
    protected $id;
    protected $email;
    protected $password;
    protected $nom;
    protected $prenom;

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

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    abstract public function seConnecter($bdd);

    public function connexion($bdd)
    {
        $req = $bdd->prepare("SELECT * FROM user WHERE email=:email AND password=:password");
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
            $_SESSION['id_user'] = $res['id_user'];
            if ($res['role'] == "admin") {
                header('Location: ../vue/#');
            } else {
                header('Location: ../vue/#');
            }

        } else {
            echo "<script>alert('Mauvais email ou mot de passe. Ressayez!');
                window.location.href='../vue/#';</script>";
        }
    }



}