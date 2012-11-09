<?php 
class eleve{
	
	
    private $nom;
    private $prenom;
    private $photo;
    private $email;
    private $telephone;
    private $id_entreprise;
    
    
    
    function __construct($nom, $prenom, $photo, $email, $telephone,$id_entreprise) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->photo = $photo;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->id_entreprise = $id_entreprise;
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

    public function getPhoto() {
        return $this->photo;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }
	public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getId_entreprise() {
        return $this->id_entreprise;
    }

    public function setId_entreprise($id_entreprise) {
        $this->id_entreprise = $id_entreprise;
    }


	



	
	
	
	
}


?>
