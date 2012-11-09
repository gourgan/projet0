<?php


class promotion{
    
     private $nom;
     private $date;
     private $responsable;
     private $login;
     private $mdp;
     
     function __construct($nom, $date, $responsable, $login, $mdp) {
         $this->nom = $nom;
         $this->date = $date;
         $this->responsable = $responsable;
         $this->login = $login;
         $this->mdp = $mdp;
     }

     public function getNom() {
         return $this->nom;
     }

     public function setNom($nom) {
         $this->nom = $nom;
     }

     public function getDate() {
         return $this->date;
     }

     public function setDate($date) {
         $this->date = $date;
     }

     public function getResponsable() {
         return $this->responsable;
     }

     public function setResponsable($responsable) {
         $this->responsable = $responsable;
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


    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
