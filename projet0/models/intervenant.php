<?php
class intervenant {
     private $nom;
     private $prenom;
     private $email;
     private $telephone;
     private $picture;
	 private $alias;
	 
	 
	 
	 
	 public function getAlias() {
         return $this->alias;
     }

     public function setAlias($alias) {
         $this->alias = $alias;
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

     function __construct($nom, $prenom, $email, $telephone,$picture,$alias) {
         $this->nom = $nom;
         $this->prenom = $prenom;
         $this->email = $email;
         $this->telephone = $telephone;    
         $this->picture = $picture;
		 $this->alias = $alias;
     }

    
    
    
}

?>
