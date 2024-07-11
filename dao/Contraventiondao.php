<?php
require_once(__DIR__ . '/../config/Database.php');
require_once(__DIR__ . '/../models/Contravention.php');
require_once(__DIR__ . '/IDao.php');

class ContraventionDAO implements IDao {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Fonction permettant d'enregistrer une contravention
    public function save($contravention): bool {
        try {
            $query = "INSERT INTO circulation (nomProprio, noPermit, noPlaque, lieuContrav, noViolation, article, date, heure, noAgent, noMatricule) 
                        VALUES (:nomProprio, :noPermit, :noPlaque, :lieuContrav, :noViolation, :article, :date, :heure, :noAgent, :noMatricule)";
            $stmt = $this->db->prepare($query);

            $nomProprio = $contravention->getNomProprio();
            $noPermit = $contravention->getNoPermit();
            $noPlaque = $contravention->getNoPlaque();
            $lieuContrav = $contravention->getLieuContrav();
            $noViolation = $contravention->getNoViolation();
            $article = $contravention->getArticle();
            $date = $contravention->getDate();
            $heure = $contravention->getHeure();
            $noAgent = $contravention->getNoAgent();
            $noMatricule = $contravention->getNoMatricule();

            $stmt->bindParam(':nomProprio', $nomProprio);
            $stmt->bindParam(':noPermit', $noPermit);
            $stmt->bindParam(':noPlaque', $noPlaque);
            $stmt->bindParam(':lieuContrav', $lieuContrav);
            $stmt->bindParam(':noViolation', $noViolation);
            $stmt->bindParam(':article', $article);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':heure', $heure);
            $stmt->bindParam(':noAgent', $noAgent);
            $stmt->bindParam(':noMatricule', $noMatricule);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion de la contravention dans la base de données : " . $e->getMessage();
        }
        return false;
    }

    // Fonction permettant de modifier une contravention
    public function update($contravention): bool {
        try {
            $query = "UPDATE circulation SET nomProprio=:nomProprio, noPermit=:noPermit, noPlaque=:noPlaque, lieuContrav=:lieuContrav, noViolation=:noViolation, article=:article, date=:date, heure=:heure, noAgent=:noAgent, noMatricule=:noMatricule WHERE code=:code";
            $stmt = $this->db->prepare($query);

            $nomProprio = $contravention->getNomProprio();
            $noPermit = $contravention->getNoPermit();
            $noPlaque = $contravention->getNoPlaque();
            $lieuContrav = $contravention->getLieuContrav();
            $noViolation = $contravention->getNoViolation();
            $article = $contravention->getArticle();
            $date = $contravention->getDate();
            $heure = $contravention->getHeure();
            $noAgent = $contravention->getNoAgent();
            $noMatricule = $contravention->getNoMatricule();
            $code = $contravention->getCode();

            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':nomProprio', $nomProprio);
            $stmt->bindParam(':noPermit', $noPermit);
            $stmt->bindParam(':noPlaque', $noPlaque);
            $stmt->bindParam(':lieuContrav', $lieuContrav);
            $stmt->bindParam(':noViolation', $noViolation);
            $stmt->bindParam(':article', $article);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':heure', $heure);
            $stmt->bindParam(':noAgent', $noAgent);
            $stmt->bindParam(':noMatricule', $noMatricule);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la modification de la contravention : " . $e->getMessage();
        }
        return false;
    }

    // Fonction permettant de rechercher une contravention
    public function search($idContravention) {
        try {
            $query = "SELECT * FROM circulation WHERE code=:code";
            $stmt = $this->db->prepare($query);

            $code = $idContravention;

            $stmt->bindParam(':code', $code);
            $stmt->execute();

            $contravention = new Contravention();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contravention->setCode($row['code']);
                $contravention->setNomProprio($row['nomProprio']);
                $contravention->setNoPermit($row['noPermit']);
                $contravention->setNoPlaque($row['noPlaque']);
                $contravention->setLieuContrav($row['lieuContrav']);
                $contravention->setNoViolation($row['noViolation']);
                $contravention->setArticle($row['article']);
                $contravention->setDate($row['date']);
                $contravention->setHeure($row['heure']);
                $contravention->setNoAgent($row['noAgent']);
                $contravention->setNoMatricule($row['noMatricule']);
            }

            return $contravention;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de la contravention : " . $e->getMessage();
        }
        return null;
    }

    // Fonction permettant de supprimer une contravention
    public function delete($id): bool {
        try {
            $query = "DELETE FROM circulation WHERE code=:code";
            $stmt = $this->db->prepare($query);

            $code = $id;

            $stmt->bindParam(':code', $code);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de la contravention : " . $e->getMessage();
        }
        return false;
    }

    // Fonction permettant d'afficher toutes les contraventions
    public function displayAll(): array {
        try {
            $query = "SELECT * FROM circulation";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            $contraventions = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contravention = new Contravention();
                $contravention->setCode($row['code']);
                $contravention->setNomProprio($row['nomProprio']);
                $contravention->setNoPermit($row['noPermit']);
                $contravention->setNoPlaque($row['noPlaque']);
                $contravention->setLieuContrav($row['lieuContrav']);
                $contravention->setNoViolation($row['noViolation']);
                $contravention->setArticle($row['article']);
                $contravention->setDate($row['date']);
                $contravention->setHeure($row['heure']);
                $contravention->setNoAgent($row['noAgent']);
                $contravention->setNoMatricule($row['noMatricule']);
                $contraventions[] = $contravention;
            }

            return $contraventions;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des contraventions : " . $e->getMessage();
            return [];
        }
    }
}
?>
