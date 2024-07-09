<?php

class Autorisation {
    private $code;
    private $marque;
    private $modele;
    private $serie;
    private $noMoteur;
    private $couleur;
    private $type;
    private $nombreCylindre;
    private $annee;
    private $puissance;
    private $noPlaque;
    private $nomProprietaire;
    private $prenomProprietaire;
    private $nifCin;
    private $adresse;

    // Constructeur
    public function __construct($code = null, $marque = null, $modele = null, $serie = null, $noMoteur = null, $couleur = null, $type = null, $nombreCylindre = null, $annee = null, $puissance = null, $noPlaque = null, $nomProprietaire = null, $prenomProprietaire = null, $nifCin = null, $adresse = null) {
        $this->code = $code;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->serie = $serie;
        $this->noMoteur = $noMoteur;
        $this->couleur = $couleur;
        $this->type = $type;
        $this->nombreCylindre = $nombreCylindre;
        $this->annee = $annee;
        $this->puissance = $puissance;
        $this->noPlaque = $noPlaque;
        $this->nomProprietaire = $nomProprietaire;
        $this->prenomProprietaire = $prenomProprietaire;
        $this->nifCin = $nifCin;
        $this->adresse = $adresse;
    }

    // Getters et setters pour chaque propriété
    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function setModele($modele) {
        $this->modele = $modele;
    }

    public function getSerie() {
        return $this->serie;
    }

    public function setSerie($serie) {
        $this->serie = $serie;
    }

    public function getNoMoteur() {
        return $this->noMoteur;
    }

    public function setNoMoteur($noMoteur) {
        $this->noMoteur = $noMoteur;
    }

    public function getCouleur() {
        return $this->couleur;
    }

    public function setCouleur($couleur) {
        $this->couleur = $couleur;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getNombreCylindre() {
        return $this->nombreCylindre;
    }

    public function setNombreCylindre($nombreCylindre) {
        $this->nombreCylindre = $nombreCylindre;
    }

    public function getAnnee() {
        return $this->annee;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
    }

    public function getPuissance() {
        return $this->puissance;
    }

    public function setPuissance($puissance) {
        $this->puissance = $puissance;
    }

    public function getNoPlaque() {
        return $this->noPlaque;
    }

    public function setNoPlaque($noPlaque) {
        $this->noPlaque = $noPlaque;
    }

    public function getNomProprietaire() {
        return $this->nomProprietaire;
    }

    public function setNomProprietaire($nomProprietaire) {
        $this->nomProprietaire = $nomProprietaire;
    }

    public function getPrenomProprietaire() {
        return $this->prenomProprietaire;
    }

    public function setPrenomProprietaire($prenomProprietaire) {
        $this->prenomProprietaire = $prenomProprietaire;
    }

    public function getNifCin() {
        return $this->nifCin;
    }

    public function setNifCin($nifCin) {
        $this->nifCin = $nifCin;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }
}
?>
