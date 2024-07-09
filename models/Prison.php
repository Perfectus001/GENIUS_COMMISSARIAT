<?php

class Prison {
    private $code;
    private $nom;
    private $adresse;
    private $nombreCellules;
    private $nombrePlacesParCellule;
    private $etat;

    // Getters and setters
    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
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

    public function getNombreCellules() {
        return $this->nombreCellules;
    }

    public function setNombreCellules($nombreCellules) {
        $this->nombreCellules = $nombreCellules;
    }

    public function getNombrePlacesParCellule() {
        return $this->nombrePlacesParCellule;
    }

    public function setNombrePlacesParCellule($nombrePlacesParCellule) {
        $this->nombrePlacesParCellule = $nombrePlacesParCellule;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

    // Implémentation de la méthode __toString
    public function __toString() {
        return "Prison [Code: $this->code, Nom: $this->nom, Adresse: $this->adresse, Nombre de Cellules: $this->nombreCellules, Nombre de Places par Cellule: $this->nombrePlacesParCellule, Etat: $this->etat]";
    }

}
?>
