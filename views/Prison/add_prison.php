<?php
require_once(__DIR__ . '/../../controllers/Prison_controller.php');

$controller = new PrisonController();
$errors = [];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prisonData = [
        'nom' => $_POST['nom'],
        'adresse' => $_POST['adresse'],
        'nombreCellules' => $_POST['nombreCellules'],
        'nombrePlacesParCellule' => $_POST['nombrePlacesParCellule']
    ];

    $result = $controller->enregistrerPrison($prisonData);

    if (isset($result['success'])) {
        $message = $result['success'];
    } elseif (isset($result['error'])) {
        $message = $result['error'];
    } elseif (isset($result['errors'])) {
        $errors = $result['errors'];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Prison</title>
    <link rel="stylesheet" href="./css/addP.css">
</head>
<body>
<a href="liste_prison.php">Liste des Prisons</a>
<div class="form-container">
    <h1>Ajouter une Prison</h1>
    <?php if ($message): ?>
        <div class="<?= isset($result['success']) ? 'success' : 'error' ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
    <form method="post" action="">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" required placeholder="Nom de la prison" pattern="[A-Za-z\s]{2,50}">
        <?php if (!empty($errors['nom'])): ?>
            <div class="error"><?= htmlspecialchars($errors['nom']) ?></div>
        <?php endif; ?>

        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id="adresse" value="<?= htmlspecialchars($_POST['adresse'] ?? '') ?>" required placeholder="Adresse de la prison" pattern="[A-Za-z0-9\s,.-]{5,100}">
        <?php if (!empty($errors['adresse'])): ?>
            <div class="error"><?= htmlspecialchars($errors['adresse']) ?></div>
        <?php endif; ?>

        <label for="nombreCellules">Nombre de Cellules:</label>
        <input type="number" name="nombreCellules" id="nombreCellules" value="<?= htmlspecialchars($_POST['nombreCellules'] ?? '') ?>" required placeholder="Ex: 10" min="1">
        <?php if (!empty($errors['nombreCellules'])): ?>
            <div class="error"><?= htmlspecialchars($errors['nombreCellules']) ?></div>
        <?php endif; ?>

        <label for="nombrePlacesParCellule">Nombre de Places par Cellule:</label>
        <input type="number" name="nombrePlacesParCellule" id="nombrePlacesParCellule" value="<?= htmlspecialchars($_POST['nombrePlacesParCellule'] ?? '') ?>" required placeholder="Ex: 4" min="1">
        <?php if (!empty($errors['nombrePlacesParCellule'])): ?>
            <div class="error"><?= htmlspecialchars($errors['nombrePlacesParCellule']) ?></div>
        <?php endif; ?>

        <button type="submit">Ajouter</button>
    </form>
</div>
</body>
</html>
