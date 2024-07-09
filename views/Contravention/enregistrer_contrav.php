<?php
require_once(__DIR__ . '/../controllers/ContraventionController.php');
require_once(__DIR__ . '/../models/Contravention.php');

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contravention = new Contravention();
    $contravention->setNomProprio($_POST['nomProprio']);
    $contravention->setNoPermit($_POST['noPermit']);
    $contravention->setNoPlaque($_POST['noPlaque']);
    $contravention->setLieuContrav($_POST['lieuContrav']);
    $contravention->setNoViolation($_POST['noViolation']);
    $contravention->setArticle($_POST['article']);
    $contravention->setDate($_POST['date']);
    $contravention->setHeure($_POST['heure']);
    $contravention->setNoAgent($_POST['noAgent']);
    $contravention->setNoMatricule($_POST['noMatricule']);

    $controller = new ContraventionController();
    $message = $controller->create($contravention);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enregistrer une contravention</title>
</head>
<body>
    <h1>Enregistrer une contravention</h1>
    <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <input type="text" name="nomProprio" placeholder="Nom Propriétaire" required><br>
        <input type="text" name="noPermit" placeholder="No. Permis" required><br>
        <input type="text" name="noPlaque" placeholder="No. Plaque" required><br>
        <input type="text" name="lieuContrav" placeholder="Lieu de contravention" required><br>
        <input type="text" name="noViolation" placeholder="No. Violation" required><br>
        <input type="text" name="article" placeholder="Article" required><br>
        <input type="date" name="date" required><br>
        <input type="time" name="heure" required><br>
        <input type="text" name="noAgent" placeholder="No. Agent" required><br>
        <input type="text" name="noMatricule" placeholder="No. Matricule" required><br>
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
