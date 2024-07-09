<?php
require_once(__DIR__ .'/../../controllers/ContraventionController.php');

$controller = new ContraventionController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contraventionData = [
        'nomProprio' => $_POST['nomProprio'],
        'noPermit' => $_POST['noPermit'],
        'noPlaque' => $_POST['noPlaque'],
        'lieuContrav' => $_POST['lieuContrav'],
        'noViolation' => $_POST['noViolation'],
        'article' => $_POST['article'],
        'date' => $_POST['date'],
        'heure' => $_POST['heure'],
        'noAgent' => $_POST['noAgent'],
        'noMatricule' => $_POST['noMatricule']
    ];

    $success = $controller->create($contraventionData);

    if ($success) {
        echo "<p>Contravention enregistrée avec succès !</p>";
    } else {
        echo "<p>Erreur lors de l'enregistrement de la contravention.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une contravention</title>
</head>
<body>
    <h2>Ajouter une contravention</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nom Propriétaire: <input type="text" name="nomProprio" required><br>
        No. Permis: <input type="text" name="noPermit" required><br>
        No. Plaque: <input type="text" name="noPlaque" required><br>
        Lieu de contravention: <input type="text" name="lieuContrav" required><br>
        No. Violation: <input type="text" name="noViolation" required><br>
        Article: <input type="text" name="article" required><br>
        Date: <input type="date" name="date" required><br>
        Heure: <input type="time" name="heure" required><br>
        No. Agent: <input type="text" name="noAgent" required><br>
        No. Matricule: <input type="text" name="noMatricule" required><br>
        <input type="submit" value="Enregistrer">
    </form>
</body>
</html>
