<?php
require_once(__DIR__ . '/controllers/AuthController.php');

$controller = new AuthController();
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Ajout de l'utilisateur
    $success = $controller->addUser($username, $password, $role);

    if (!$success) {
        // L'utilisateur existe déjà
        $error = "Cet utilisateur existe déjà.";
    } else {
        // Redirection vers une page de succès ou une autre action
        header('Location: dashboard.php'); // Exemple de redirection vers la page de connexion
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="./views/Autorisation/css/style.css">
</head>
<body>
    <form method="post" action="">
        <h1>Inscription</h1>
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required>
        <label for="role">Rôle:</label>
        <input type="text" name="role" id="role" required>
        <input type="submit" value="S'inscrire">
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
    </form>
</body>
</html>
