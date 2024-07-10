<?php
require_once(__DIR__ . '/../dao/dao_prison.php');
require_once(__DIR__ . '/../models/Prison.php');

class PrisonController {
    private $prisonDAO;

    public function __construct() {
        $this->prisonDAO = new PrisonDAO();
    }

    public function enregistrerPrison($prisonData) {
        $errors = $this->validateData($prisonData);

        if (empty($errors)) {
            $prison = new Prison();
            $prison->setNom($prisonData['nom']);
            $prison->setAdresse($prisonData['adresse']);
            $prison->setNombreCellules($prisonData['nombreCellules']);
            $prison->setNombrePlacesParCellule($prisonData['nombrePlacesParCellule']);
            $prison->setEtat(1); // Actif par défaut

            if ($this->prisonDAO->ajouterPrison($prison)) {
                // Redirection vers la liste des prisons après l'ajout
                header('Location: liste_prison.php');
                exit; // Assure que le script s'arrête après la redirection
            } else {
                return ['error' => 'Erreur lors de l\'ajout de la prison.'];
            }
        } else {
            return ['errors' => $errors];
        }
    }

    private function validateData($data) {
        $errors = [];

        if (!preg_match('/^[a-zA-Z0-9\s\-]{2,50}$/', $data['nom'])) {
            $errors['nom'] = 'Nom invalide.';
        }

        if (!preg_match('/^[a-zA-Z0-9\s\-]{2,100}$/', $data['adresse'])) {
            $errors['adresse'] = 'Adresse invalide.';
        }

        if (!filter_var($data['nombreCellules'], FILTER_VALIDATE_INT)) {
            $errors['nombreCellules'] = 'Nombre de Cellules invalide.';
        }

        if (!filter_var($data['nombrePlacesParCellule'], FILTER_VALIDATE_INT)) {
            $errors['nombrePlacesParCellule'] = 'Nombre de Places par Cellule invalide.';
        }

        return $errors;
    }

    public function listerPrisons() {
        return $this->prisonDAO->listerPrisons();
    }

    public function modifierPrison($code, $prisonData) {
        $errors = $this->validateData($prisonData);

        if (empty($errors)) {
            $prison = new Prison();
            $prison->setCode($code);
            $prison->setNom($prisonData['nom']);
            $prison->setAdresse($prisonData['adresse']);
            $prison->setNombreCellules($prisonData['nombreCellules']);
            $prison->setNombrePlacesParCellule($prisonData['nombrePlacesParCellule']);

            if ($this->prisonDAO->modifierPrison($prison)) {
                // Redirection vers la liste des prisons après la modification
                header('Location: liste_prison.php');
                exit; // Assure que le script s'arrête après la redirection
            } else {
                return ['error' => 'Erreur lors de la modification de la prison.'];
            }
        } else {
            return ['errors' => $errors];
        }
    }

    public function supprimerPrison($code) {
        if ($this->prisonDAO->supprimerPrison($code)) {
            return ['success' => 'Prison supprimée avec succès.'];
        } else {
            return ['error' => 'Erreur lors de la suppression de la prison.'];
        }
    }
}


?>
