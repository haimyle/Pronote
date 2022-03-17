<?php
require_once 'Utilisateur.php';
class Etudiant extends Utilisateur
{
    private $ref_classe;

    public function __construct(array $donnees)
    {
        parent::__construct($donnees);
    }

    /*private $id;
    private $email;
    private $password;
    private $nom;
    private $prenom;
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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }*/


    public function seConnecter($bdd)
    {
        $req = $bdd->prepare("SELECT * FROM etudiant WHERE email=:email AND password=:password");
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
            $_SESSION['id_etudiant'] = $res['id_etudiant'];
            echo "<script>alert('Bienvenue!');
                window.location.href='#';</script>";
        } else {
            echo "<script>alert('Mauvais email ou mot de passe. Ressayez!');
                window.location.href='#';</script>";
        }
    }
}