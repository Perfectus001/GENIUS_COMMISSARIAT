<?php
// Importer la classe Database pour la connexion à la base de données
require_once(__DIR__ . '/../config/Database.php');
// Importer la classe Autorisation qui représente le modèle
require_once(__DIR__ . '/../models/Autorisation.php');

class AutorisationDAO {
    private $conn;

    // Constructeur pour initialiser la connexion à la base de données
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Méthode pour ajouter une nouvelle autorisation
    public function ajouterAutorisation($autorisation) {
        // Requête SQL pour insérer une nouvelle autorisation
        $query = 'INSERT INTO autorisation (marque, modele, serie, no_moteur, couleur, type, nombre_cylindre, annee, puissance, no_plaque, nom_proprietaire, prenom_proprietaire, nif_cin, adresse) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $stmt = $this->conn->prepare($query);

        // Associer les valeurs des paramètres de la requête SQL
        $stmt->bindValue(1, $autorisation->getMarque());
        $stmt->bindValue(2, $autorisation->getModele());
        $stmt->bindValue(3, $autorisation->getSerie());
        $stmt->bindValue(4, $autorisation->getNoMoteur());
        $stmt->bindValue(5, $autorisation->getCouleur());
        $stmt->bindValue(6, $autorisation->getType());
        $stmt->bindValue(7, $autorisation->getNombreCylindre());
        $stmt->bindValue(8, $autorisation->getAnnee());
        $stmt->bindValue(9, $autorisation->getPuissance());
        $stmt->bindValue(10, $autorisation->getNoPlaque());
        $stmt->bindValue(11, $autorisation->getNomProprietaire());
        $stmt->bindValue(12, $autorisation->getPrenomProprietaire());
        $stmt->bindValue(13, $autorisation->getNifCin());
        $stmt->bindValue(14, $autorisation->getAdresse());

        // Exécuter la requête
        return $stmt->execute();
    }

    // Méthode pour lister toutes les autorisations
    public function listerAutorisations() {
        // Requête SQL pour sélectionner toutes les autorisations
        $query = 'SELECT * FROM autorisation';
        $stmt = $this->conn->query($query);

        $autorisations = [];

        // Parcourir les résultats de la requête
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Créer une nouvelle instance d'Autorisation et remplir les valeurs
            $autorisation = new Autorisation();
            $autorisation->setCode($row['code']);
            $autorisation->setMarque($row['marque']);
            $autorisation->setModele($row['modele']);
            $autorisation->setSerie($row['serie']);
            $autorisation->setNoMoteur($row['no_moteur']);
            $autorisation->setCouleur($row['couleur']);
            $autorisation->setType($row['type']);
            $autorisation->setNombreCylindre($row['nombre_cylindre']);
            $autorisation->setAnnee($row['annee']);
            $autorisation->setPuissance($row['puissance']);
            $autorisation->setNoPlaque($row['no_plaque']);
            $autorisation->setNomProprietaire($row['nom_proprietaire']);
            $autorisation->setPrenomProprietaire($row['prenom_proprietaire']);
            $autorisation->setNifCin($row['nif_cin']);
            $autorisation->setAdresse($row['adresse']);

            // Ajouter l'autorisation à la liste
            $autorisations[] = $autorisation;
        }

        // Retourner la liste des autorisations
        return $autorisations;
    }

    // Méthode pour rechercher une autorisation par son code
    public function rechercherAutorisation($code) {
        // Requête SQL pour sélectionner une autorisation par son code
        $query = 'SELECT * FROM autorisation WHERE code = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $code);
        $stmt->execute();

        // Si une autorisation est trouvée, la retourner
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $autorisation = new Autorisation();
            $autorisation->setCode($row['code']);
            $autorisation->setMarque($row['marque']);
            $autorisation->setModele($row['modele']);
            $autorisation->setSerie($row['serie']);
            $autorisation->setNoMoteur($row['no_moteur']);
            $autorisation->setCouleur($row['couleur']);
            $autorisation->setType($row['type']);
            $autorisation->setNombreCylindre($row['nombre_cylindre']);
            $autorisation->setAnnee($row['annee']);
            $autorisation->setPuissance($row['puissance']);
            $autorisation->setNoPlaque($row['no_plaque']);
            $autorisation->setNomProprietaire($row['nom_proprietaire']);
            $autorisation->setPrenomProprietaire($row['prenom_proprietaire']);
            $autorisation->setNifCin($row['nif_cin']);
            $autorisation->setAdresse($row['adresse']);

            return $autorisation;
        }

        // Si aucune autorisation n'est trouvée, retourner null
        return null;
    }

    // Méthode pour supprimer une autorisation par son code
    public function supprimerAutorisation($code) {
        // Requête SQL pour supprimer une autorisation par son code
        $query = 'DELETE FROM autorisation WHERE code = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $code);

        // Exécuter la requête
        return $stmt->execute();
    }
}
?>
