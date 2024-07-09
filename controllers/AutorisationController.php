<?php require_once(__DIR__ . '/../dao/dao_autorisation.php');
require_once(__DIR__ . '/../models/Autorisation.php');

class AutorisationController {
    private $dao;

    public function __construct() {
        $this->dao = new AutorisationDAO();
    }

    public function enregistrerAutorisation($data) {
        $errors = $this->validateData($data);

        if (empty($errors)) {
            $autorisation = new Autorisation();
            $autorisation->setMarque($data['marque']);
            $autorisation->setModele($data['modele']);
            $autorisation->setSerie($data['serie']);
            $autorisation->setNoMoteur($data['no_moteur']);
            $autorisation->setCouleur($data['couleur']);
            $autorisation->setType($data['type']);
            $autorisation->setNombreCylindre($data['nombre_cylindre']);
            $autorisation->setAnnee($data['annee']);
            $autorisation->setPuissance($data['puissance']);
            $autorisation->setNoPlaque($data['no_plaque']);
            $autorisation->setNomProprietaire($data['nom_proprietaire']);
            $autorisation->setPrenomProprietaire($data['prenom_proprietaire']);
            $autorisation->setNifCin($data['nif_cin']);
            $autorisation->setAdresse($data['adresse']);

            if ($this->dao->ajouterAutorisation($autorisation)) {
                return ['success' => 'Autorisation ajoutée avec succès.'];
            } else {
                return ['error' => 'Erreur lors de l\'ajout de l\'autorisation.'];
            }
        } else {
            return ['errors' => $errors];
        }
    }

    private function validateData($data) {
        $errors = [];

        if (!preg_match('/^[a-zA-Z0-9\s\-]{2,50}$/', $data['marque'])) {
            $errors['marque'] = 'Marque invalide.';
        }

        if (!preg_match('/^[a-zA-Z0-9\s\-]{2,50}$/', $data['modele'])) {
            $errors['modele'] = 'Modèle invalide.';
        }

        if (!preg_match('/^[a-zA-Z0-9\s\-]{2,50}$/', $data['serie'])) {
            $errors['serie'] = 'Série invalide.';
        }

        if (!preg_match('/^[a-zA-Z0-9\s\-]{2,50}$/', $data['no_moteur'])) {
            $errors['no_moteur'] = 'No Moteur invalide.';
        }

        if (!preg_match('/^[a-zA-Z0-9\s\-]{2,50}$/', $data['couleur'])) {
            $errors['couleur'] = 'Couleur invalide.';
        }

        if (!preg_match('/^[a-zA-Z0-9\s\-]{2,50}$/', $data['type'])) {
            $errors['type'] = 'Type invalide.';
        }

        if (!filter_var($data['nombre_cylindre'], FILTER_VALIDATE_INT)) {
            $errors['nombre_cylindre'] = 'Nombre de Cylindres invalide.';
        }

        if (!filter_var($data['annee'], FILTER_VALIDATE_INT)) {
            $errors['annee'] = 'Année invalide.';
        }

        if (!filter_var($data['puissance'], FILTER_VALIDATE_INT)) {
            $errors['puissance'] = 'Puissance invalide.';
        }

        if (!preg_match('/^[A-Z0-9]{6,10}$/', $data['no_plaque'])) {
            $errors['no_plaque'] = 'Numéro de Plaque invalide.';
        }

        if (!preg_match('/^[a-zA-Z\s\-]{2,50}$/', $data['nom_proprietaire'])) {
            $errors['nom_proprietaire'] = 'Nom du Propriétaire invalide.';
        }

        if (!preg_match('/^[a-zA-Z\s\-]{2,50}$/', $data['prenom_proprietaire'])) {
            $errors['prenom_proprietaire'] = 'Prénom du Propriétaire invalide.';
        }

        if (!preg_match('/^[0-9]{10,17}$/', $data['nif_cin'])) {
            $errors['nif_cin'] = 'NIF/CIN invalide.';
        }

        if (!preg_match('/^[a-zA-Z0-9\s\-]{2,50}$/', $data['adresse'])) {
            $errors['adresse'] = 'Adresse invalide.';
        }

        return $errors;
    }

    public function listerAutorisations() {
        return $this->dao->listerAutorisations();
    }

    public function rechercherAutorisation($code) {
        return $this->dao->rechercherAutorisation($code);
    }

    public function supprimerAutorisation($code) {
        if ($this->dao->supprimerAutorisation($code)) {
            return ['success' => 'Autorisation supprimée avec succès.'];
        } else {
            return ['error' => 'Erreur lors de la suppression de l\'autorisation.'];
        }
    }
}
?>
