<?php
class utilisateur {
     private $login;
     private $mdp;
     private $nom;
     private $prenom;
     private $email;
     private $telephone;
     private $picture;
     private $alias;
     
     
     function __construct($login, $mdp, $nom, $prenom, $email, $telephone, $picture, $alias) {
         $this->login = $login;
         $this->mdp = $mdp;
         $this->nom = $nom;
         $this->prenom = $prenom;
         $this->email = $email;
         $this->telephone = $telephone;
         $this->picture = $picture;
         $this->alias = $alias;
     }
     
     public function getLogin() {
         return $this->login;
     }

     public function setLogin($login) {
         $this->login = $login;
     }

     public function getMdp() {
         return $this->mdp;
     }

     public function setMdp($mdp) {
         $this->mdp = $mdp;
     }

     public function getNom() {
         return $this->nom;
     }

     public function setNom($nom) {
         $this->nom = $nom;
     }

     public function getPrenom() {
         return $this->prenom;
     }

     public function setPrenom($prenom) {
         $this->prenom = $prenom;
     }

     public function getEmail() {
         return $this->email;
     }

     public function setEmail($email) {
         $this->email = $email;
     }

     public function getTelephone() {
         return $this->telephone;
     }

     public function setTelephone($telephone) {
         $this->telephone = $telephone;
     }

     public function getPicture() {
         return $this->picture;
     }

     public function setPicture($picture) {
         $this->picture = $picture;
     }

     public function getAlias() {
         return $this->alias;
     }

     public function setAlias($alias) {
         $this->alias = $alias;
     }



     
	 
	 
	 
	 
	

    
    
    
}

?>
