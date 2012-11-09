<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class absence {
    private $date_absence;
    private $id_eleve;
    private $statut;
    
    
    function __construct($date_absence, $id_eleve,$statut) {
        $this->date_absence = $date_absence;
		$this->id_eleve = $id_eleve;
        $this->statut = $statut;
    }
    public function getDate_absence() {
        return $this->date_absence;
    }

    public function setDate_absence($date_absence) {
        $this->date_absence = $date_absence;
    }

    public function getId_eleve() {
        return $this->id_eleve;
    }

    public function setId_eleve($id_eleve) {
        $this->id_eleve = $id_eleve;
    }

   
    public function getStatut() {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }


    
}
?>
