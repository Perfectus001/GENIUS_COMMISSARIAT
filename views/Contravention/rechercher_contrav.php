<?php
require_once(__DIR__ . '/../controllers/ContraventionController.php');

$error = "";
$contravention = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $controller = new ContraventionController();
    $contravention = $controller->readOne($code);
    if ($contravention === null) {
        $error = "Contravention non trouvée.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rechercher une contravention</title>
</head>
<body>
    <h1>Rechercher une contravention</h1>
    <?php if (!empty($error)): ?>
        <p><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <input type="text" name="code" placeholder="Code de la contravention" required>
        <button type="submit">Rechercher</button>
    </form>
    <?php if ($contravention !== null): ?>
        <h2>Résultats de la recherche :</h2>
        <p>Code : <?php echo htmlspecialchars($contravention->getCode()); ?></p>
        <p>Nom Propriétaire : <?php echo htmlspecialchars($contravention->getNomProprio()); ?></p>
        <p>No. Permis : <?php echo htmlspecialchars($contravention->getNoPermit()); ?></p>
        <p>No. Plaque : <?php echo htmlspecialchars($contravention->getNoPlaque()); ?></p>
        <p>Lieu de contravention : <?php echo htmlspecialchars($contravention->getLieuContrav()); ?></p>
        <p>No. Violation : <?php echo htmlspecialchars($contravention->getNoViolation()); ?></p>
        <p>Article : <?php echo htmlspecialchars($contravention->getArticle()); ?></p>
        <p>Date : <?php echo htmlspecialchars($contravention->getDate()); ?></p>
        <p>Heure : <?php echo htmlspecialchars($contravention->getHeure()); ?></p>
        <p>No. Agent : <?php echo htmlspecialchars($contravention->getNoAgent()); ?></p>
        <p>No. Matricule : <?php echo htmlspecialchars($contravention->getNoMatricule()); ?></p>
    <?php endif; ?>
</body>
</html>
