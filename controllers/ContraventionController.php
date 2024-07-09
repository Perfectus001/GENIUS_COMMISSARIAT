<?php
include_once __DIR__ . '/../dao/Contraventiondao.php';
include_once __DIR__ . '/../models/Contravention.php';

class ContraventionController {
    private $dao;

    public function __construct() {
        $this->dao = new ContraventionDAO();
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $contravention = new Contravention();
            $contravention->setNomProprio($_POST['nomProprio']);
            $contravention->setNoPermit($_POST['noPermit']);
            $contravention->setNoPlaque($_POST['noPlaque']);
            $contravention->setLieuContrav($_POST['lieuContrav']);
            $contravention->setNoViolation($_POST['noViolation']);
            $contravention->setArticle($_POST['article']);
            $contravention->setDate($_POST['date']);
            $contravention->setHeure($_POST['heure']);
            $contravention->setNoAgent($_POST['noAgent']);
            $contravention->setNoMatricule($_POST['noMatricule']);

            if ($this->dao->create($contravention)) {
                echo "Nouvelle contravention enregistrée avec succès.";
            } else {
                echo "Erreur: Impossible d'enregistrer la contravention.";
            }
        }
    }

    public function read() {
        return $this->dao->read();
    }

    public function readOne() {
        if (isset($_GET['code'])) {
            return $this->dao->readOne($_GET['code']);
        }
    }

    public function delete() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($this->dao->delete($_POST['code'])) {
                echo "Contravention supprimée avec succès.";
            } else {
                echo "Erreur: Impossible de supprimer la contravention.";
            }
        }
    }
}
?>
