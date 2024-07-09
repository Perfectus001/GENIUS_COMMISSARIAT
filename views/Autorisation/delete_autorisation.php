<?php
require_once(__DIR__ . '/../../controllers/AutorisationController.php');

$controller = new AutorisationController();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];

    // Rechercher l'autorisation par son code
    $autorisation = $controller->rechercherAutorisation($code);

    if ($autorisation) {
        // Supprimer l'autorisation si elle existe
        $controller->supprimerAutorisation($code);
        $message = "L'autorisation avec le code $code a été supprimée avec succès.";
    } else {
        $message = "Aucune autorisation trouvée avec le code $code.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer Autorisation</title>
    <link rel="stylesheet" href="./css/deleteA.css"> <!-- Ajustez le chemin vers votre fichier CSS -->
 
</head>
<body>
    <div class="form-container">
        <h2>Supprimer une Autorisation</h2>
        <?php if ($message): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <label for="code">Code de l'Autorisation :</label>
            <input type="text" id="code" name="code" required>
            <button type="submit">Supprimer</button>
        </form>
    </div>
</body>
</html>
