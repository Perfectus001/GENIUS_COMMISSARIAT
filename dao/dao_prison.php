<?php

require_once(__DIR__ . '/../models/Prison.php');
require_once(__DIR__ . '/../config/Database.php');

class PrisonDAO {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function ajouterPrison($prison) {
        try {
            $query = "INSERT INTO prison (nom, adresse, nombreCellules, nombrePlacesParCellule, etat) 
                      VALUES (:nom, :adresse, :nombreCellules, :nombrePlacesParCellule, :etat)";
            $stmt = $this->db->prepare($query);

            $nom = $prison->getNom();
            $adresse = $prison->getAdresse();
            $nombreCellules = $prison->getNombreCellules();
            $nombrePlacesParCellule = $prison->getNombrePlacesParCellule();
            $etat = $prison->getEtat();

            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':nombreCellules', $nombreCellules);
            $stmt->bindParam(':nombrePlacesParCellule', $nombrePlacesParCellule);
            $stmt->bindParam(':etat', $etat);

            $stmt->execute();

            // Récupérer le code auto-incrémenté
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de la prison : " . $e->getMessage();
            return false;
        }
    }

    public function listerPrisons() {
        try {
            $query = "SELECT * FROM prison";
            $stmt = $this->db->query($query);
            $prisons = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['etat'] == 0) { // Afficher seulement les prisons non supprimées
                    $prison = new Prison();
                    $prison->setCode($row['code']);
                    $prison->setNom($row['nom']);
                    $prison->setAdresse($row['adresse']);
                    $prison->setNombreCellules($row['nombreCellules']);
                    $prison->setNombrePlacesParCellule($row['nombrePlacesParCellule']);
                    $prison->setEtat($row['etat']);
                    $prisons[] = $prison;
                }
            }

            return $prisons;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des prisons : " . $e->getMessage();
            return [];
        }
    }

    public function modifierPrison($prison) {
        try {
            $query = "UPDATE prison SET nom=:nom, adresse=:adresse, nombreCellules=:nombreCellules, nombrePlacesParCellule=:nombrePlacesParCellule WHERE code=:code";
            $stmt = $this->db->prepare($query);

            $code = $prison->getCode();
            $nom = $prison->getNom();
            $adresse = $prison->getAdresse();
            $nombreCellules = $prison->getNombreCellules();
            $nombrePlacesParCellule = $prison->getNombrePlacesParCellule();

            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':nombreCellules', $nombreCellules);
            $stmt->bindParam(':nombrePlacesParCellule', $nombrePlacesParCellule);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la modification de la prison : " . $e->getMessage();
            return false;
        }
    }

    public function supprimerPrison($code) {
        try {
            $query = "UPDATE prison SET etat=1 WHERE code=:code";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':code', $code);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de la prison : " . $e->getMessage();
            return false;
        }
    }
}

?>
