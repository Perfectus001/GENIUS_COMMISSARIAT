<?php
require_once(__DIR__ . '/../controllers/prison_controller.php');

$controller = new PrisonController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prisonData = [
        'nom' => $_POST['nom'],
        'adresse' => $_POST['adresse'],
        'nombreCellules' => $_POST['nombreCellules'],
        'nombrePlacesParCellule' => $_POST['nombrePlacesParCellule']
    ];

    $success = $controller->enregistrerPrison($prisonData);

    if ($success) {
        echo "<p>Prison ajoutée avec succès !</p>";
    } else {
        echo "<p>Erreur lors de l'ajout de la prison.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une Prison</title>
</head>
<body>
<a href="liste_prison.php">  liste des prison </a>
    <h1>Ajouter une Prison</h1>
    <form method="POST" action="">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required><br><br>

        <label for="nombreCellules">Nombre de Cellules :</label>
        <input type="number" id="nombreCellules" name="nombreCellules" required><br><br>

        <label for="nombrePlacesParCellule">Nombre de Places par Cellule :</label>
        <input type="number" id="nombrePlacesParCellule" name="nombrePlacesParCellule" required><br><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
