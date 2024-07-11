<?php
require_once(__DIR__ . '/../../controllers/Prison_controller.php');

$controller = new PrisonController();
$errors = [];
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prisonData = [
        'nom' => $_POST['nom'],
        'adresse' => $_POST['adresse'],
        'nombreCellules' => $_POST['nombreCellules'],
        'nombrePlacesParCellule' => $_POST['nombrePlacesParCellule']
    ];

    $result = $controller->enregistrerPrison($prisonData);

    if (isset($result['success'])) {
        $message = $result['success'];
    } elseif (isset($result['error'])) {
        $message = $result['error'];
    } elseif (isset($result['errors'])) {
        $errors = $result['errors'];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Prison</title>
    <link rel="stylesheet" href="./css/addP.css">
     <!-- Favicons -->
  <link href="../../partialsassets/img/favicon.png" rel="icon">
  <link href="../../partials/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../partials/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../partials/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../partials/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../partials/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../partials/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../partials/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../partials/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../partials/assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php include('../../partials/sidebar.php');
    ?>

 
<div class="form-container">
    <h1>Ajouter une Prison</h1>
    <?php if ($message): ?>
        <div class="<?= isset($result['success']) ? 'success' : 'error' ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
    <form method="post" action="">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" required placeholder="Nom de la prison" pattern="[A-Za-z\s]{2,50}">
        <?php if (!empty($errors['nom'])): ?>
            <div class="error"><?= htmlspecialchars($errors['nom']) ?></div>
        <?php endif; ?>

        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id="adresse" value="<?= htmlspecialchars($_POST['adresse'] ?? '') ?>" required placeholder="Adresse de la prison" pattern="[A-Za-z0-9\s,.-]{5,100}">
        <?php if (!empty($errors['adresse'])): ?>
            <div class="error"><?= htmlspecialchars($errors['adresse']) ?></div>
        <?php endif; ?>

        <label for="nombreCellules">Nombre de Cellules:</label>
        <input type="number" name="nombreCellules" id="nombreCellules" value="<?= htmlspecialchars($_POST['nombreCellules'] ?? '') ?>" required placeholder="Ex: 10" min="1">
        <?php if (!empty($errors['nombreCellules'])): ?>
            <div class="error"><?= htmlspecialchars($errors['nombreCellules']) ?></div>
        <?php endif; ?>

        <label for="nombrePlacesParCellule">Nombre de Places par Cellule:</label>
        <input type="number" name="nombrePlacesParCellule" id="nombrePlacesParCellule" value="<?= htmlspecialchars($_POST['nombrePlacesParCellule'] ?? '') ?>" required placeholder="Ex: 4" min="1">
        <?php if (!empty($errors['nombrePlacesParCellule'])): ?>
            <div class="error"><?= htmlspecialchars($errors['nombrePlacesParCellule']) ?></div>
        <?php endif; ?>

        <button type="submit">Ajouter</button>
    </form>
</div>

  <!-- Vendor JS Files -->
  <script src="../../partials/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../partials/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../partials/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../partials/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../partials/assets/vendor/quill/quill.js"></script>
  <script src="../../partials/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../partials/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../partials/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../partials/assets/js/main.js"></script>
</body>
</html>
