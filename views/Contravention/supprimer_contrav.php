<?php
require_once(__DIR__ . '/../controllers/ContraventionController.php');

$message = "";
$code = $_GET['code'] ?? null;

if ($code !== null) {
    $controller = new ContraventionController();
    $message = $controller->delete($code);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Supprimer une contravention</title>
</head>
<body>
    <h1>Supprimer une contravention</h1>
    <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
        <a href="afficher_contravention.php">Retour à la liste des contraventions</a>
    <?php else: ?>
        <p>Aucune contravention sélectionnée.</p>
    <?php endif; ?>
</body>
</html>
