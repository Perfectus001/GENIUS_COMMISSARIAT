<?php
require_once(__DIR__ .'/../../controllers/ContraventionController.php');

$controller = new ContraventionController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->delete();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Supprimer une contravention</title>
</head>
<body>
    <h2>Supprimer une contravention</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Code: <input type="text" name="code" required><br>
        <input type="submit" value="Supprimer">
    </form>
</body>
</html>
9/*