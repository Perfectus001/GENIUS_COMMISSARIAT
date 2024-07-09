<?php
require_once(__DIR__ . '/../../controllers/prison_controller.php');

$controller = new PrisonController();
$prisons = $controller->listerPrisons();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Prisons</title>
   <link rel="stylesheet" href="./css/listeP.css">
</head>
<body>
<a href="modifier_prison.php">  modifier prison </a>
<a href="liste.php">  liste 2 </a>
<a href="../Autorisation/add_autorisation.php"> ajouter une autorisation </a>
<a href="add_prison.php"> Ajouter Prison</a>
    <h1>Liste des Prisons</h1>
    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Nombre de Cellules</th>
                <th>Nombre de Places par Cellule</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($prisons) > 0): ?>
                <?php foreach ($prisons as $prison): ?>
                    <?php if ($prison->getEtat() == 0): // Afficher seulement les prisons non supprimées ?>
                        <tr>
                            <td><?php echo htmlspecialchars($prison->getCode()); ?></td>
                            <td><?php echo htmlspecialchars($prison->getNom()); ?></td>
                            <td><?php echo htmlspecialchars($prison->getAdresse()); ?></td>
                            <td><?php echo htmlspecialchars($prison->getNombreCellules()); ?></td>
                            <td><?php echo htmlspecialchars($prison->getNombrePlacesParCellule()); ?></td>
                            <td>
                                <a href="modifier_prison.php?code=<?php echo htmlspecialchars($prison->getCode()); ?>">Modifier</a> |
                                <a href="delete_prison.php?code=<?php echo htmlspecialchars($prison->getCode()); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette prison ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Aucune prison enregistrée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
