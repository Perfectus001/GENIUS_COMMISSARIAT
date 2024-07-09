<?php
require_once(__DIR__ .'/../config/Database.php');
require_once(__DIR__ .'/../models/Contravention.php');

class ContraventionDAO {
    private $conn;
    private $table_name = "circulation";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        if ($this->conn === null) {
            die("La connexion à la base de données a échoué.");
        }
    }

    public function create($contravention) {
        $query = "INSERT INTO " . $this->table_name . " SET
                    nomProprio=:nomProprio, noPermit=:noPermit, noPlaque=:noPlaque, 
                    lieuContrav=:lieuContrav, noViolation=:noViolation, article=:article, 
                    date=:date, heure=:heure, noAgent=:noAgent, noMatricule=:noMatricule";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nomProprio", $contravention->getNomProprio());
        $stmt->bindParam(":noPermit", $contravention->getNoPermit());
        $stmt->bindParam(":noPlaque", $contravention->getNoPlaque());
        $stmt->bindParam(":lieuContrav", $contravention->getLieuContrav());
        $stmt->bindParam(":noViolation", $contravention->getNoViolation());
        $stmt->bindParam(":article", $contravention->getArticle());
        $stmt->bindParam(":date", $contravention->getDate());
        $stmt->bindParam(":heure", $contravention->getHeure());
        $stmt->bindParam(":noAgent", $contravention->getNoAgent());
        $stmt->bindParam(":noMatricule", $contravention->getNoMatricule());

        if ($stmt->execute()) {
            return true;
        }

        echo "Erreur lors de la création de la contravention : " . implode(" ", $stmt->errorInfo());
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne($code) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE code = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $code);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
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

            return $contravention;
        }

        return null;
    }

    public function delete($code) {
        $query = "DELETE FROM " . $this->table_name . " WHERE code = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $code);

        if ($stmt->execute()) {
            return true;
        }

        echo "Erreur lors de la suppression de la contravention : " . implode(" ", $stmt->errorInfo());
        return false;
    }
}
?>
