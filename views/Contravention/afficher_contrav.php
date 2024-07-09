<?php
require_once(__DIR__ . '/../controllers/ContraventionController.php');

$controller = new ContraventionController();
$contraventions = $controller->read();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des contraventions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Liste des contraventions</h1>
    <?php if ($contraventions === null): ?>
        <p>Erreur lors de la récupération des contraventions.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom Propriétaire</th>
                    <th>No. Permis</th>
                    <th>No. Plaque</th>
                    <th>Lieu de contravention</th>
                    <th>No. Violation</th>
                    <th>Article</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>No. Agent</th>
                    <th>No. Matricule</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($contraventions) > 0): ?>
                    <?php foreach ($contraventions as $contravention): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($contravention['code']); ?></td>
                            <td><?php echo htmlspecialchars($contravention['nomProprio']); ?></td>
                            <td><?php echo htmlspecialchars($contravention['noPermit']); ?></td>
                            <td><?php echo htmlspecialchars($contravention['noPlaque']); ?></td>
                            <td><?php echo htmlspecialchars($contravention['lieuContrav']); ?></td>
                            <td><?php echo htmlspecialchars($contravention['noViolation']); ?></td>
                            <td><?php echo htmlspecialchars($contravention['article']); ?></td>
                            <td><?php echo htmlspecialchars($contravention['date']); ?></td>
                            <td><?php echo htmlspecialchars($contravention['heure']); ?></td>
                            <td><?php echo htmlspecialchars($contravention['noAgent']); ?></td>
                            <td><?php echo htmlspecialchars($contravention['noMatricule']); ?></td>
                            <td>
                                <a href="modifier_contravention.php?code=<?php echo htmlspecialchars($contravention['code']); ?>">Modifier</a> |
                                <a href="delete_contravention.php?code=<?php echo htmlspecialchars($contravention['code']); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette contravention ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="12">Aucune contravention enregistrée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
