<?php

require_once 'ConnexionManager.php';
/**
     * Classe de gestion des accès utilisateur
     */
class UserDao 
{
   
    private $id;
    private $nom;
    private $prenom;
    private $username;
    private $mdp;
    private $deleted;
    private $statut;

        public function __construct()
        {
            $this->bdd = (new ConnexionManager)->getInstance();
        }
    
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
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
    public function getMail()
    {
        return $this->mail;
    }
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    public function getStatut()
    {
        return $this->statut;
    }
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getMdp()
    {
        return $this->mdp;
    }
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    public function getDeleted()
    {
        return $this->deleted;
    }
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    public function testEditeur($username,$pwd)
    {
        $reponse = $this->bdd->query('SELECT id FROM user WHERE username=\'' . $username . '\'  AND mdp=\'' . $pwd . '\' and statut=1');

            $donnees = $reponse->fetch();

            if($donnees)   {
                return true;
            } 
            else{
                return false;
                
            }  
    }

}