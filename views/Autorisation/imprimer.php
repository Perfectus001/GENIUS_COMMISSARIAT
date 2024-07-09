<?php
// Importer les contrôleurs nécessaires
require_once(__DIR__ . '/../../controllers/AutorisationController.php');

// Vérifier si un code a été passé via l'URL
if (!isset($_GET['code'])) {
    die("Code d'autorisation manquant.");
}

$code = $_GET['code'];
$controller = new AutorisationController();
$autorisation = $controller->rechercherAutorisation($code);

if (!$autorisation) {
    die("Autorisation non trouvée.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Imprimer Autorisation</title>
    <link rel="stylesheet" href="./css/imprimerA.css"> <!-- Ajustez le chemin vers votre fichier CSS -->
   
</head>
<body>
    <div class="print-container">
   
        <div class="print-header">
            <img src="./images/dra.png" alt="Drapeau d'Haïti"> <!-- Ajustez le chemin vers votre image du drapeau -->
            <p>Liberté, Égalité, Fraternité</p>
            <p>Sous-Commissariat de Trou-du-Nord</p>
            <h1>Autorisation de Véhicule</h1>
        
        </div>
        <h2>Détails de l'Autorisation</h2>
        <div class="print-details">
            <div class="detail-item"><strong>Code:</strong> <?php echo htmlspecialchars($autorisation->getCode()); ?></div>
            <div class="detail-item"><strong>Marque:</strong> <?php echo htmlspecialchars($autorisation->getMarque()); ?></div>
            <div class="detail-item"><strong>Modèle:</strong> <?php echo htmlspecialchars($autorisation->getModele()); ?></div>
            <div class="detail-item"><strong>Série:</strong> <?php echo htmlspecialchars($autorisation->getSerie()); ?></div>
            <div class="detail-item"><strong>No Moteur:</strong> <?php echo htmlspecialchars($autorisation->getNoMoteur()); ?></div>
            <div class="detail-item"><strong>Couleur:</strong> <?php echo htmlspecialchars($autorisation->getCouleur()); ?></div>
            <div class="detail-item"><strong>Type:</strong> <?php echo htmlspecialchars($autorisation->getType()); ?></div>
            <div class="detail-item"><strong>Nombre de Cylindres:</strong> <?php echo htmlspecialchars($autorisation->getNombreCylindre()); ?></div>
            <div class="detail-item"><strong>Année:</strong> <?php echo htmlspecialchars($autorisation->getAnnee()); ?></div>
            <div class="detail-item"><strong>Puissance:</strong> <?php echo htmlspecialchars($autorisation->getPuissance()); ?></div>
            <div class="detail-item"><strong>No Plaque:</strong> <?php echo htmlspecialchars($autorisation->getNoPlaque()); ?></div>
            <div class="detail-item"><strong>Nom du Propriétaire:</strong> <?php echo htmlspecialchars($autorisation->getNomProprietaire()); ?></div>
            <div class="detail-item"><strong>Prénom du Propriétaire:</strong> <?php echo htmlspecialchars($autorisation->getPrenomProprietaire()); ?></div>
            <div class="detail-item"><strong>NIF/CIN:</strong> <?php echo htmlspecialchars($autorisation->getNifCin()); ?></div>
            <div class="detail-item"><strong>Adresse:</strong> <?php echo htmlspecialchars($autorisation->getAdresse()); ?></div>
        </div>
        <div class="print-button">
            <button onclick="window.print()">Imprimer</button>
        </div>
    </div>
</body>
</html>
