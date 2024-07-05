<?php

require_once(__DIR__ . '/../dao/dao_prison.php');

class PrisonController {
    private $prisonDAO;

    public function __construct() {
        $this->prisonDAO = new PrisonDAO();
    }

    public function enregistrerPrison($prisonData) {
        $prison = new Prison();
        $prison->setNom($prisonData['nom']);
        $prison->setAdresse($prisonData['adresse']);
        $prison->setNombreCellules($prisonData['nombreCellules']);
        $prison->setNombrePlacesParCellule($prisonData['nombrePlacesParCellule']);
        $prison->setEtat(0);

        return $this->prisonDAO->ajouterPrison($prison);
    }

    public function listerPrisons() {
        return $this->prisonDAO->listerPrisons();
    }

    public function modifierPrison($code, $prisonData) {
        $prison = new Prison();
        $prison->setCode($code);
        $prison->setNom($prisonData['nom']);
        $prison->setAdresse($prisonData['adresse']);
        $prison->setNombreCellules($prisonData['nombreCellules']);
        $prison->setNombrePlacesParCellule($prisonData['nombrePlacesParCellule']);

        return $this->prisonDAO->modifierPrison($prison);
    }

    public function supprimerPrison($code) {
        return $this->prisonDAO->supprimerPrison($code);
    }
}

?>
