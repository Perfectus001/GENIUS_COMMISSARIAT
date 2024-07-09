<?php
    //La classe Detenu
    class Detenu{
        //attribut
        private $code;
        private $nom;
        private $prenom;
        private $cin_nif;
        private $sexe;
        private $adresse;
        private $telephone;
        private $infraction;
        private $statut;
        private $codePrison;
        private $dateArrestation;
        private $etat;

        //Constructeur
        public function __construct(/*$code, $nom, $prenom, $cin_nif, $sexe, $adresse, $telephone, $infraction, $statut, $dateArrestation, $codePrison*/)
        {
           /* $this->code = $code;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->cin_nif = $cin_nif;
            $this->sexe = $sexe;
            $this->adresse = $adresse;
            $this->telephone = $telephone;
            $this->infraction = $infraction;
            $this->statut = $statut;
            $this->dateArrestation = $dateArrestation;
            $this->codePrison = $codePrison;*/
        }


        //Getters et Setters
        public function getCode(){
            return $this->code;
        }

        public function setCode($code){
            $this->code = $code;
        }

        public function getNom(){
            return $this->nom;
        }

        public function setnom($nom){
            $this->nom = $nom;
        }

        public function getPrenom(){
            return $this->prenom;
        }

        public function setPrenom($prenom){
            $this->prenom = $prenom;
        }

        public function getCin_nif(){
            return $this->cin_nif;
        }

        public function setCin_nif($cin_nif){
            $this->cin_nif = $cin_nif;
        }

        public function getSexe(){
            return $this->sexe;
        }

        public function setSexe($sexe){
            $this->sexe = $sexe;
        }

        public function getAdresse(){
            return $this->adresse;
        }

        public function setAdresse($adresse){
            $this->adresse = $adresse;
        }

        public function getTelephone(){
            return $this->telephone;
        }

        public function setTelephone($telephone){
            $this->telephone = $telephone;
        }

        public function getInfraction(){
            return $this->infraction;
        }

        public function setInfraction($infraction){
            $this->infraction = $infraction;
        }

        public function getStatut(){
            return $this->statut;
        }

        public function setStatut($statut){
            $this->statut = $statut;
        }

        public function getCodePrison(){
            return $this->codePrison;
        }

        public function setCodePrison($codePrison){
            $this->codePrison = $codePrison;
        }

        public function getDateArrestation(){
            return $this->dateArrestation;
        }

        public function setDateArrestation($dateArrestation){
            $this->dateArrestation = $dateArrestation;
        }

        public function getEtat(){
            return $this->etat;
        }

        public function setEtat($etat){
            $this->etat = $etat;
        }
        //------
    }


