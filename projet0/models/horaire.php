<?php

class horraire{
    private $date;
    private $quand;
    private $matiere;
    private $abrev_intervenant;
    

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getQuand() {
        return $this->quand;
    }

    public function setQuand($quand) {
        $this->quand = $quand;
    }

    public function getMatiere() {
        return $this->matiere;
    }

    public function setMatiere($matiere) {
        $this->matiere = $matiere;
    }

    public function getAbrev_intervenant() {
        return $this->abrev_intervenant;
    }

    public function setAbrev_intervenant($abrev_intervenant) {
        $this->abrev_intervenant = $abrev_intervenant;
    }

    
    function __construct($date, $quand, $matiere, $abrev_intervenant) {
        $this->date = $date;
        $this->quand = $quand;
        $this->matiere = $matiere;
        $this->abrev_intervenant = $abrev_intervenant;
    }


}

?>
