<?php
class Contravention {
    private $code;
    private $nomProprio;
    private $noPermit;
    private $noPlaque;
    private $lieuContrav;
    private $noViolation;
    private $article;
    private $date;
    private $heure;
    private $noAgent;
    private $noMatricule;

    // Getters and setters for each attribute
    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function getNomProprio() {
        return $this->nomProprio;
    }

    public function setNomProprio($nomProprio) {
        $this->nomProprio = $nomProprio;
    }

    public function getNoPermit() {
        return $this->noPermit;
    }

    public function setNoPermit($noPermit) {
        $this->noPermit = $noPermit;
    }

    public function getNoPlaque() {
        return $this->noPlaque;
    }
 
    public function setNoPlaque($noPlaque) {
        $this->noPlaque = $noPlaque;
    }

    public function getLieuContrav() {
        return $this->lieuContrav;
    }

    public function setLieuContrav($lieuContrav) {
        $this->lieuContrav = $lieuContrav;
    }

    public function getNoViolation() {
        return $this->noViolation;
    }

    public function setNoViolation($noViolation) {
        $this->noViolation = $noViolation;
    }

    public function getArticle() {
        return $this->article;
    }

    public function setArticle($article) {
        $this->article = $article;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getHeure() {
        return $this->heure;
    }

    public function setHeure($heure) {
        $this->heure = $heure;
    }

    public function getNoAgent() {
        return $this->noAgent;
    }

    public function setNoAgent($noAgent) {
        $this->noAgent = $noAgent;
    }

    public function getNoMatricule() {
        return $this->noMatricule;
    }

    public function setNoMatricule($noMatricule) {
        $this->noMatricule = $noMatricule;
    }
}
?>
