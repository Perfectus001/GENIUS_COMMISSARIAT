<?php
require_once(__DIR__ .'/../../controllers/ContraventionController.php') ;

$controller = new circulationController();
$contravention = null;
if (isset($_GET['code'])) {
    $contravention = $controller->readOne();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rechercher une contravention</title>
</head>
<body>
    <h2>Rechercher une contravention</h2>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Code: <input type="text" name="code" required><br>
        <input type="submit" value="Rechercher">
    </form>

    <?php if ($contravention): ?>
        <h2>Détails de la contravention</h2>
        <p>Nom Propriétaire: <?php echo $contravention->getNomProprio(); ?></p>
        <p>No. Permis: <?php echo $contravention->getNoPermit(); ?></p>
        <p>No. Plaque: <?php echo $contravention->getNoPlaque(); ?></p>
        <p>Lieu de contravention: <?php echo $contravention->getLieuContrav(); ?></p>
        <p>No. Violation: <?php echo $contravention->getNoViolation(); ?></p>
        <p>Article: <?php echo $contravention->getArticle(); ?></p>
        <p>Date: <?php echo $contravention->getDate(); ?></p>
        <p>Heure: <?php echo $contravention->getHeure(); ?></p>
        <p>No. Agent: <?php echo $contravention->getNoAgent(); ?></p>
        <p>No. Matricule: <?php echo $contravention->getNoMatricule(); ?></p>
    <?php endif; ?>
</body>
</html>
