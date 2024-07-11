<?php
require_once(__DIR__ . '/../../controllers/Prison_controller.php');

$controller = new PrisonController();
$prisons = $controller->listerPrisons();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Prisons</title>
    <link rel="stylesheet" href="./css/listegP.css">
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
    <div class="sidebar">
        <?php include('../../partials/sidebar.php'); ?>
    </div>
    <div class="main-content">
        
        <h1>Liste des Prisons</h1>
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Nombre de Cellules</th>
                    <th>Nombre de Places par Cellule</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($prisons) > 0): ?>
                    <?php foreach ($prisons as $prison): ?>
                        <?php if ($prison->getEtat() == 1): // Afficher seulement les prisons non supprimées ?>
                            <tr>
                                <td><?php echo htmlspecialchars($prison->getCode()); ?></td>
                                <td><?php echo htmlspecialchars($prison->getNom()); ?></td>
                                <td><?php echo htmlspecialchars($prison->getAdresse()); ?></td>
                                <td><?php echo htmlspecialchars($prison->getNombreCellules()); ?></td>
                                <td><?php echo htmlspecialchars($prison->getNombrePlacesParCellule()); ?></td>
                                <td>
                                    <a href="modifier_prison.php?code=<?php echo htmlspecialchars($prison->getCode()); ?>">Modifier</a> |
                                    <a href="delete_prison.php?code=<?php echo htmlspecialchars($prison->getCode()); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette prison ?');">Supprimer</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Aucune prison enregistrée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
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
