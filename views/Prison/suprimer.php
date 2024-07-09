<?php
require_once(__DIR__ . '/../../controllers/prison_controller.php');

$controller = new PrisonController();

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $success = $controller->supprimerPrison($code);

    if ($success) {
        echo "<p>Prison supprimée avec succès !</p>";
    } else {
        echo "<p>Erreur lors de la suppression de la prison.</p>";
    }
} else {
    echo "<p>Aucun code de prison spécifié.</p>";
    exit;
}

header('Location: liste_prison.php');
exit;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Saisir le Code de la Prison à Supprimer</title>
</head>
<body>
    <h1>Saisir le Code de la Prison à Supprimer</h1>
    <form method="GET" action="suprimer.php">
        <label for="code">Code de la Prison :</label>
        <input type="text" id="code" name="code" required>
        <input type="submit" value="Supprimer">
    </form>
</body>
</html>
