<?php
require_once(__DIR__ . '/../../controllers/Prison_controller.php');

$controller = new PrisonController();

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $prisons = $controller->listerPrisons();

    $currentPrison = null;
    foreach ($prisons as $prison) {
        if ($prison->getCode() == $code) {
            $currentPrison = $prison;
            break;
        }
    }

    if ($currentPrison === null) {
        echo "<p>Prison non trouvée.</p>";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $prisonData = [
            'nom' => $_POST['nom'],
            'adresse' => $_POST['adresse'],
            'nombreCellules' => $_POST['nombreCellules'],
            'nombrePlacesParCellule' => $_POST['nombrePlacesParCellule']
        ];

        $success = $controller->modifierPrison($code, $prisonData);

        if ($success) {
            echo "<p>Prison modifiée avec succès !</p>";
        } else {
            echo "<p>Erreur lors de la modification de la prison.</p>";
        }
    }
} else {
    echo "<p>Aucun code de prison spécifié.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une Prison</title>
    <link rel="stylesheet" href="./css/modifierP.css">
    <link href="../../partials/assets/img/favicon.png" rel="icon">
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
div class="sidebar">
        <?php include('../../partials/sidebar.php'); ?>
    </div>
    <div class="main-content">
    
        <form method="POST" action="">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($currentPrison->getNom()); ?>" required><br><br>

            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" value="<?php echo htmlspecialchars($currentPrison->getAdresse()); ?>" required><br><br>

            <label for="nombreCellules">Nombre de Cellules :</label>
            <input type="number" id="nombreCellules" name="nombreCellules" value="<?php echo htmlspecialchars($currentPrison->getNombreCellules()); ?>" required><br><br>

            <label for="nombrePlacesParCellule">Nombre de Places par Cellule :</label>
            <input type="number" id="nombrePlacesParCellule" name="nombrePlacesParCellule" value="<?php echo htmlspecialchars($currentPrison->getNombrePlacesParCellule()); ?>" required><br><br>

            <input type="submit" value="Modifier">
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
