<?php
require_once(__DIR__ . '/../../controllers/AutorisationController.php');

$controller = new AutorisationController();
$autorisations = $controller->listerAutorisations();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Autorisations</title>
    <link rel="stylesheet" href="./css/listeA.css">
</head>
<body>
    <h1>Liste des Autorisations</h1>
    <a href="add_autorisation.php">Ajouter une Autorisation</a>
    <a href="rechercher.php">Rechercher une Autorisation</a>
    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Série</th>
                <th>No moteur</th>
                <th>Couleur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($autorisations) > 0): ?>
                <?php foreach ($autorisations as $autorisation): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($autorisation->getCode()); ?></td>
                        <td><?php echo htmlspecialchars($autorisation->getMarque()); ?></td>
                        <td><?php echo htmlspecialchars($autorisation->getModele()); ?></td>
                        <td><?php echo htmlspecialchars($autorisation->getSerie()); ?></td>
                        <td><?php echo htmlspecialchars($autorisation->getNoMoteur()); ?></td>
                        <td><?php echo htmlspecialchars($autorisation->getCouleur()); ?></td>
                        <td>
                            <a href="detail_autorisation.php?code=<?php echo htmlspecialchars($autorisation->getCode()); ?>">Voir plus +</a> |
                            <a href="delete_autorisation.php?code=<?php echo htmlspecialchars($autorisation->getCode()); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette autorisation ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Aucune autorisation enregistrée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
