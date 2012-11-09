<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

 class entreprise {
      private $nom;
      private $adresse;
      private $telephone;
      private $email;
      
      
      function __construct($nom, $adresse, $telephone, $email) {
          $this->nom = $nom;
          $this->adresse = $adresse;
          $this->telephone = $telephone;
          $this->email = $email;
      }

      public function getNom() {
          return $this->nom;
      }

      public function setNom($nom) {
          $this->nom = $nom;
      }

      public function getAdresse() {
          return $this->adresse;
      }

      public function setAdresse($adresse) {
          $this->adresse = $adresse;
      }

      public function getTelephone() {
          return $this->telephone;
      }

      public function setTelephone($telephone) {
          $this->telephone = $telephone;
      }

      public function getEmail() {
          return $this->email;
      }

      public function setEmail($email) {
          $this->email = $email;
      }


     
 }
?>
