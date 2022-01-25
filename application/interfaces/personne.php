<?php
defined('BASEPATH') Or exit ('No direct script access allowed');

interface Personne extends CI_Controller{

    private $nomComplet;
    private $login;
    private $password;
    private $telephone;


    public function seConnecter();
    public function seDeconnecter();
    public function creerCompte();

    public function getNomComplet()
    {
        return $nomComplet;
    }

    public function setNomComplet($nomComplet)
    {
        $this->$nomComplet = $nomComplet;
    }

    public function getLogin()
    {
        return $login;

    }

    public function setLogin($login)
    {
        $this->$login = $login;
    }

    public function getPassword()
    {
        return $password;
    }

    public function setPassword($password){

        $this->$password = $password;
    }

        //-------------------------------

    public function setTelephone($tel){
            
        $this->$telephone = $tel;
    }
            
    public function getTelephone()
    {
        return $telephone;
    }

    
}
?>