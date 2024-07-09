<?php
require_once(__DIR__ . '/../../controllers/prison_controller.php');

$controller = new PrisonController();

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $prison = $controller->listerPrisons();

    foreach ($prison as $p) {
        if ($p->getCode() == $code) {
            $currentPrison = $p;
            break;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $prisonData = [
            'nom' => $_POST['nom'],
            'adresse' => $_POST['adresse'],
            'nombreCellules' => $_POST['nombreCellules'],
            'nombrePlacesParCellule' => $_POST['nombrePlacesParCellule']
        ];

        $success = $controller->modifierPrison($code, $prisonData);

        if ($success) {
            echo "<p>Prison modifiée avec succès !</p>";
        } else {
            echo "<p>Erreur lors de la modification de la prison.</p>";
        }
    }
} else {
    echo "<p>Aucun code de prison spécifié.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier une Prison</title>
    <link rel="stylesheet" href="./css/modifierP.css">
</head>
<body>
    <h1>Modifier une Prison</h1>
    <form method="POST" action="">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($currentPrison->getNom()); ?>" required><br><br>

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" value="<?php echo htmlspecialchars($currentPrison->getAdresse()); ?>" required><br><br>

        <label for="nombreCellules">Nombre de Cellules :</label>
        <input type="number" id="nombreCellules" name="nombreCellules" value="<?php echo htmlspecialchars($currentPrison->getNombreCellules()); ?>" required><br><br>

        <label for="nombrePlacesParCellule">Nombre de Places par Cellule :</label>
        <input type="number" id="nombrePlacesParCellule" name="nombrePlacesParCellule" value="<?php echo htmlspecialchars($currentPrison->getNombrePlacesParCellule()); ?>" required><br><br>

        <input type="submit" value="Modifier">
    </form>
</body>
</html>
