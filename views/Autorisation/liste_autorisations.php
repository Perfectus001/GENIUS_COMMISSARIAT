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
                <th>Type</th>
                <th>Nombre de cylindre</th>
                <th>Année</th>
                <th>Puissance</th>
                <th>No plaque</th>
                <th>Nom du propriétaire</th>
                <th>Prénom du propriétaire</th>
                <th>NIF/CIN</th>
                <th>Adresse</th>
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
                        <td><?php echo htmlspecialchars($autorisation->getType()); ?></td>
                        <td><?php echo htmlspecialchars($autorisation->getNombreCylindre()); ?></td>
                        <td><?php echo htmlspecialchars($autorisation->getAnnee()); ?></td>
                        <td><?php echo htmlspecialchars($autorisation->getPuissance()); ?></td>
                        <td><?php echo htmlspecialchars($autorisation->getNoPlaque()); ?></td>
                        <td><?php echo htmlspecialchars($autorisation->getNomProprietaire()); ?></td>
                        <td><?php echo htmlspecialchars($autorisation->getPrenomProprietaire()); ?></td>
                        <td><?php echo htmlspecialchars($autorisation->getNifCin()); ?></td>
                        <td><?php echo htmlspecialchars($autorisation->getAdresse()); ?></td>
                        <td>
                             <a href="delete_autorisation.php?code=<?php echo htmlspecialchars($autorisation->getCode()); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette autorisation ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="16">Aucune autorisation enregistrée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
