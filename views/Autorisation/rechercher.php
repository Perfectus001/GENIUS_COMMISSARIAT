<?php
require_once(__DIR__ . '/../../controllers/AutorisationController.php');

// Initialiser le contrôleur
$controller = new AutorisationController();
$autorisation = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    $autorisation = $controller->rechercherAutorisation($code);

    if (!$autorisation) {
        $error = "Aucune autorisation trouvée pour le code $code.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rechercher une Autorisation</title>
    <link rel="stylesheet" href="./css/rechercherA.css">
 <style>
    /* Styles de base pour le corps de la page */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* Conteneur principal */
.container {
    width: 80%;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Titre principal */
h1 {
    text-align: center;
    color: #333;
}

/* Styles pour le formulaire */
form {
    max-width: 400px;
    margin: 0 auto 20px;
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
    color: #333;
}

input[type="text"], input[type="submit"] {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

input[type="text"] {
    width: calc(100% - 22px); /* Ajuster la largeur pour tenir compte du padding et de la bordure */
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Message d'erreur */
.error {
    color: red;
    text-align: center;
}

/* Conteneur pour les détails de l'autorisation */
.details {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.details h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.details .detail-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 30%;
    box-sizing: border-box;
}

/* Conteneur de la grille */
.details-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: space-between;
}

.details p strong {
    display: inline-block;
    width: 200px;
    color: #333;
}

   </style>
</head>
<body>
    <div class="container">
        <h1>Rechercher une Autorisation par Code</h1>
        <form method="post" action="">
            <label for="code">Code:</label>
            <input type="text" name="code" id="code" required>
            <input type="submit" value="Rechercher">
        </form>

        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php elseif ($autorisation): ?>
            <div class="details">
                <h2>Détails de l'Autorisation</h2>
                <div class="details-grid">
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
                <td>
    <a href="imprimer.php?code=<?php echo htmlspecialchars($autorisation->getCode()); ?>">Imprimer</a>
</td>

            </div>
        <?php endif; ?>
    </div>
</body>
</html>
