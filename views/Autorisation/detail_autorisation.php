<?php
require_once(__DIR__ . '/../../controllers/AutorisationController.php');

// Vérifier si le paramètre "code" est présent dans l'URL
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Instancier le contrôleur d'autorisation et rechercher l'autorisation par son code
    $controller = new AutorisationController();
    $autorisation = $controller->rechercherAutorisation($code);

    // Vérifier si une autorisation a été trouvée
    if ($autorisation) {
        // Afficher le détail de l'autorisation
?>
<!DOCTYPE html>
<html>
<head>
    <title>Détails de l'Autorisation</title>
    <link rel="stylesheet" href="./css/detailA.css">
</head>
<body>
    <h1>Détails de l'Autorisation</h1>
    <table>
        <tr>
            <th>Code</th>
            <td><?php echo htmlspecialchars($autorisation->getCode()); ?></td>
        </tr>
        <tr>
            <th>Marque</th>
            <td><?php echo htmlspecialchars($autorisation->getMarque()); ?></td>
        </tr>
        <tr>
            <th>Modèle</th>
            <td><?php echo htmlspecialchars($autorisation->getModele()); ?></td>
        </tr>
        <tr>
            <th>Série</th>
            <td><?php echo htmlspecialchars($autorisation->getSerie()); ?></td>
        </tr>
        <tr>
            <th>No moteur</th>
            <td><?php echo htmlspecialchars($autorisation->getNoMoteur()); ?></td>
        </tr>
        <tr>
            <th>Couleur</th>
            <td><?php echo htmlspecialchars($autorisation->getCouleur()); ?></td>
        </tr>
        <tr>
            <th>Type</th>
            <td><?php echo htmlspecialchars($autorisation->getType()); ?></td>
        </tr>
        <tr>
            <th>Nombre de cylindre</th>
            <td><?php echo htmlspecialchars($autorisation->getNombreCylindre()); ?></td>
        </tr>
        <tr>
            <th>Année</th>
            <td><?php echo htmlspecialchars($autorisation->getAnnee()); ?></td>
        </tr>
        <tr>
            <th>Puissance</th>
            <td><?php echo htmlspecialchars($autorisation->getPuissance()); ?></td>
        </tr>
        <tr>
            <th>No plaque</th>
            <td><?php echo htmlspecialchars($autorisation->getNoPlaque()); ?></td>
        </tr>
        <tr>
            <th>Nom du propriétaire</th>
            <td><?php echo htmlspecialchars($autorisation->getNomProprietaire()); ?></td>
        </tr>
        <tr>
            <th>Prénom du propriétaire</th>
            <td><?php echo htmlspecialchars($autorisation->getPrenomProprietaire()); ?></td>
        </tr>
        <tr>
            <th>NIF/CIN</th>
            <td><?php echo htmlspecialchars($autorisation->getNifCin()); ?></td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td><?php echo htmlspecialchars($autorisation->getAdresse()); ?></td>
        </tr>
    </table>
    <br>
    <a href="liste_autorisations.php">Retour à la liste des autorisations</a>
</body>
</html>
<?php
    } else {
        // Si aucune autorisation correspondante n'est trouvée
        echo "Aucune autorisation trouvée pour le code : " . htmlspecialchars($code);
    }
} else {
    // Si le paramètre "code" n'est pas spécifié dans l'URL
    echo "Code d'autorisation non spécifié.";
}
?>
