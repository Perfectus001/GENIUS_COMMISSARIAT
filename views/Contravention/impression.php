<?php
// Importer les contrôleurs nécessaires
require_once(__DIR__ . '/../../controllers/AutorisationController.php');


if (isset($_GET['contravention'])) {
    $contravention = $_GET['contravention'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Imprimer Contravention</title>
    <link rel="stylesheet" href="../Autorisation/css/imprimerA.css"> <!-- Ajustez le chemin vers votre fichier CSS -->
   
</head>
<body>
    <div class="print-container">
   
        <div class="print-header">
            <img src="../Autorisation/images/dra.png" alt="Drapeau d'Haïti"> <!-- Ajustez le chemin vers votre image du drapeau -->
            <p>Liberté, Égalité, Fraternité</p>
            <p>Sous-Commissariat de Trou-du-Nord</p>
            <h1>Autorisation de Véhicule</h1>
        <hr>
        </div>
        <h3>Détails de la contravention</h3>
        <div class="print-details">
            <div class="detail-item"><strong>Code:</strong> <?php echo htmlspecialchars($contravention['idContrav']); ?></div>
            <div class="detail-item"><strong>Nom Proprietaire:</strong> <?php echo htmlspecialchars($contravention['nomProprio']); ?></div>
            <div class="detail-item"><strong>No Permit:</strong> <?php echo htmlspecialchars($contravention['noPermit']); ?></div>
            <div class="detail-item"><strong>No Plaque:</strong> <?php echo htmlspecialchars($contravention['noPlaque']); ?></div>
            <div class="detail-item"><strong>Lieu Contravention:</strong> <?php echo htmlspecialchars($contravention['lieuContrav']); ?></div>
            <div class="detail-item"><strong>No Violation:</strong> <?php echo htmlspecialchars($contravention['noViolation']); ?></div>
            <div class="detail-item"><strong>Article:</strong> <?php echo htmlspecialchars($contravention['article']); ?></div>
            <div class="detail-item"><strong>Date:</strong> <?php echo htmlspecialchars($contravention['date']); ?></div>
            <div class="detail-item"><strong>Heure:</strong> <?php echo htmlspecialchars($contravention['heure']); ?></div>
            <div class="detail-item"><strong>No Agent:</strong> <?php echo htmlspecialchars($contravention['noAgent']); ?></div>
            <div class="detail-item"><strong>No Matricule:</strong> <?php echo htmlspecialchars($contravention['noMatricule']); ?></div>
        </div>
        <div class="print-button">
            <button onclick="window.print()">Imprimer</button>
        </div>
    </div>
</body>
</html>
