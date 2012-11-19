<?php

class role_utilisateur{
    private $id_role;
    private $id_utilisateur;
   
    
    function __construct($id_role, $id_utilisateur) {
        $this->id_role = $id_role;
        $this->id_utilisateur = $id_utilisateur;
    }
    public function getId_role() {
        return $this->id_role;
    }

    public function setId_role($id_role) {
        $this->id_role = $id_role;
    }

    public function getId_utilisateur() {
        return $this->id_utilisateur;
    }

    public function setId_utilisateur($id_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
    }




}

?>
