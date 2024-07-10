<?php
require_once(__DIR__ . '/../config/Database.php');
require_once(__DIR__ . '/../models/Detenu.php');
require_once(__DIR__ . '/IDao.php');

class DetenuDao implements IDao{
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    //fonction permettant d'enregistrer un detenu
    public function save($detenu):bool{
        try {
            //Requete vers la base de donnee
            $query = "INSERT INTO detenu (nom, prenom, cin_nif, sexe, adresse, telephone, infraction, statut, codePrison, dateArrestation) 
                        VALUES (:nom, :prenom, :cin_nif, :sexe, :adresse, :telephone, :infraction, :statut, :codePrison, :dateArrestation)";
            $stmt = $this->db->prepare($query);

            $nom = $detenu->getNom();
            $prenom = $detenu->getPrenom();
            $cin_nif = $detenu->getCin_nif();
            $sexe = $detenu->getSexe();
            $adresse = $detenu->getAdresse();
            $telephone = $detenu->getTelephone();
            $infraction = $detenu->getInfraction();
            $statut = 'incarcerer';
            $codePrison = null;
            $dateArrestation = Date('Y-m-d H-i-s');

            //Passage des parametres de la requete
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':cin_nif', $cin_nif);
            $stmt->bindParam(':sexe', $sexe);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':infraction', $infraction);
            $stmt->bindParam(':codePrison', $codePrison);
            $stmt->bindParam(':statut', $statut);
            $stmt->bindParam(':dateArrestation', $dateArrestation);

            //Execution de la requete et retour d'une valeur boolean
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion du detenu a la base de donnee : " . $e->getMessage();
        }
        return false;
    }

    //fonction permettant de modifier un detenu
    public function update($detenu):bool{
        try {
            $query = "UPDATE detenu SET nom=:nom, prenom=:prenom, cin_nif=:cin_nif, sexe=:sexe, adresse=:adresse, telephone=:telephone, infraction=:infraction, statut=:statut, codePrison=:codePrison WHERE etat=:etat AND code=:code";
            $stmt = $this->db->prepare($query);

            $nom = $detenu->getNom();
            $prenom = $detenu->getPrenom();
            $cin_nif = $detenu->getCin_nif();
            $sexe = $detenu->getSexe();
            $adresse = $detenu->getAdresse();
            $telephone = $detenu->getTelephone();
            $infraction = $detenu->getInfraction();
            $statut = 'incarcerer';
            $codePrison = $detenu->getCodePrison();
            $etat = '1';
            $code = $detenu->getCode();

            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':cin_nif', $cin_nif);
            $stmt->bindParam(':sexe', $sexe);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':infraction', $infraction);
            $stmt->bindParam(':codePrison', $codePrison);
            $stmt->bindParam(':statut', $statut);
            $stmt->bindParam(':etat', $etat);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la modification de la prison : " . $e->getMessage();
        }
        return false;
    }

    //fonction permettant de rechercher un detenu
    public function search($idDetenu){
        try {
            $query = "SELECT * FROM detenu where etat=:etat AND code=:code";
            $stmt = $this->db->prepare($query);

            $etat = '1';
            $code = $idDetenu;

            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':etat', $etat);
            $stmt->execute();

            $detenu = new Detenu();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $detenu->setCode($row['code']);
                $detenu->setNom($row['nom']);
                $detenu->setPrenom($row['prenom']);
                $detenu->setCin_nif($row['cin_nif']);
                $detenu->setSexe($row['sexe']);
                $detenu->setAdresse($row['adresse']);
                $detenu->setTelephone($row['telephone']);
                $detenu->setInfraction($row['infraction']);
                $detenu->setCodePrison($row['codePrison']);
                $detenu->setDateArrestation($row['dateArrestation']);
                $detenu->setStatut($row['statut']);
                $detenu->setEtat($row['etat']);
            }

            return $detenu;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des prisons : " . $e->getMessage();
        }
        return null;
    }

    //fonction permettant de supprimer un detenu
    public function delete($id):bool{
        try {
            $query = "DELETE FROM detenu WHERE etat=:etat AND code=:code";
            $stmt = $this->db->prepare($query);

            $etat = 1;
            $code = $id;

            $stmt->bindParam(':etat', $etat);
            $stmt->bindParam(':code', $code);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la modification de la prison : " . $e->getMessage();
        }
        return false;
    }

    //fonction permettant de supprimer un detenu
    public function liberer($id):bool{
        try {
            $query = "UPDATE detenu SET statut=:statut, etat=:etat WHERE code=:code";
            $stmt = $this->db->prepare($query);

            $etat = 0;
            $code = $id;
            $statut = 'liberer';

            $stmt->bindParam(':statut', $statut);
            $stmt->bindParam(':etat', $etat);
            $stmt->bindParam(':code', $code);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la modification de la prison : " . $e->getMessage();
        }
        return false;
    }

    //fonction permettant de supprimer un detenu
    public function transferer($id, $idPrison):bool{
        try {
            $query = "UPDATE detenu SET codePrison=:codePrison WHERE code=:code";
            $stmt = $this->db->prepare($query);

            $code = $id;
            $codePrison = $idPrison;

            $stmt->bindParam(':codePrison', $codePrison);
            $stmt->bindParam(':code', $code);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la modification de la prison : " . $e->getMessage();
        }
        return false;
    }

    //fonction permettant d'afficher les detenus
    public function displayAll():array{
        try {
            $query = "SELECT * FROM detenu WHERE etat=:etat";
            $stmt = $this->db->prepare($query);

            $etat = '1';
            $stmt->bindParam(':etat', $etat);
            $stmt->execute();

            $detenus = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $detenu = new Detenu();
                    $detenu->setCode($row['code']);
                    $detenu->setNom($row['nom']);
                    $detenu->setPrenom($row['prenom']);
                    $detenu->setCin_nif($row['cin_nif']);
                    $detenu->setSexe($row['sexe']);
                    $detenu->setAdresse($row['adresse']);
                    $detenu->setTelephone($row['telephone']);
                    $detenu->setInfraction($row['infraction']);
                    $detenu->setCodePrison($row['codePrison']);
                    $detenu->setDateArrestation($row['dateArrestation']);
                    $detenu->setStatut($row['statut']);
                    $detenu->setEtat($row['etat']);
                    $detenus[] = $detenu;
            }

            return $detenus;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des prisons : " . $e->getMessage();
            return [];
        }
    }

        //fonction permettant d'afficher les detenus
    public function displayAllLib():array{
        try {
            $query = "SELECT * FROM detenu WHERE etat=:etat";
            $stmt = $this->db->prepare($query);

            $etat = '0';
            $stmt->bindParam(':etat', $etat);
            $stmt->execute();

            $detenus = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $detenu = new Detenu();
                    $detenu->setCode($row['code']);
                    $detenu->setNom($row['nom']);
                    $detenu->setPrenom($row['prenom']);
                    $detenu->setCin_nif($row['cin_nif']);
                    $detenu->setSexe($row['sexe']);
                    $detenu->setAdresse($row['adresse']);
                    $detenu->setTelephone($row['telephone']);
                    $detenu->setInfraction($row['infraction']);
                    $detenu->setCodePrison($row['codePrison']);
                    $detenu->setDateArrestation($row['dateArrestation']);
                    $detenu->setStatut($row['statut']);
                    $detenu->setEtat($row['etat']);
                    $detenus[] = $detenu;
            }

            return $detenus;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des prisons : " . $e->getMessage();
            return [];
        }
    }

    public function nombreDetenu($idPrison):int{
        try {
            $query = "SELECT COUNT(*) AS total FROM detenu WHERE etat=:etat AND codePrison=:codePrison";
            $stmt = $this->db->prepare($query);

            $etat = '1';
            $codePrison = $idPrison;
            $stmt->bindParam(':etat', $etat);
            $stmt->bindParam(':codePrison', $codePrison);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $row['total'];

            return $total;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des prisons : " . $e->getMessage();
        }
        return 0;
    }
}