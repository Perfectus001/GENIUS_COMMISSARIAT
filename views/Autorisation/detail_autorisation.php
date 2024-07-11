<?php
require_once(__DIR__ . '/../../controllers/AutorisationController.php');

// Vérifier si le paramètre "code" est présent dans l'URL
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Instancier le contrôleur d'autorisation et rechercher l'autorisation par son code
    $controller = new AutorisationController();
    $autorisation = $controller->rechercherAutorisation($code);

    // Vérifier si une autorisation a été trouvée
    if ($autorisation) {
        // Afficher le détail de l'autorisation
?>
<!DOCTYPE html>
<html>
<head>
    <title>Détails de l'Autorisation</title>
    <link rel="stylesheet" href="css/detailsAu.css">
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
    <div class="table-container">
        <h1>Détails de l'Autorisation</h1>
        <table>
            <tr>
                <th>Code</th>
                <td><?php echo htmlspecialchars($autorisation->getCode()); ?></td>
                <th>Marque</th>
                <td><?php echo htmlspecialchars($autorisation->getMarque()); ?></td>
            </tr>
            <tr>
                <th>Modèle</th>
                <td><?php echo htmlspecialchars($autorisation->getModele()); ?></td>
                <th>Série</th>
                <td><?php echo htmlspecialchars($autorisation->getSerie()); ?></td>
            </tr>
            <tr>
                <th>No moteur</th>
                <td><?php echo htmlspecialchars($autorisation->getNoMoteur()); ?></td>
                <th>Couleur</th>
                <td><?php echo htmlspecialchars($autorisation->getCouleur()); ?></td>
            </tr>
            <tr>
                <th>Type</th>
                <td><?php echo htmlspecialchars($autorisation->getType()); ?></td>
                <th>Nombre de cylindre</th>
                <td><?php echo htmlspecialchars($autorisation->getNombreCylindre()); ?></td>
            </tr>
            <tr>
                <th>Année</th>
                <td><?php echo htmlspecialchars($autorisation->getAnnee()); ?></td>
                <th>Puissance</th>
                <td><?php echo htmlspecialchars($autorisation->getPuissance()); ?></td>
            </tr>
            <tr>
                <th>No plaque</th>
                <td><?php echo htmlspecialchars($autorisation->getNoPlaque()); ?></td>
                <th>Nom du propriétaire</th>
                <td><?php echo htmlspecialchars($autorisation->getNomProprietaire()); ?></td>
            </tr>
            <tr>
                <th>Prénom du propriétaire</th>
                <td><?php echo htmlspecialchars($autorisation->getPrenomProprietaire()); ?></td>
                <th>NIF/CIN</th>
                <td><?php echo htmlspecialchars($autorisation->getNifCin()); ?></td>
            </tr>
            <tr>
                <th>Adresse</th>
                <td colspan="3"><?php echo htmlspecialchars($autorisation->getAdresse()); ?></td>
            </tr>
        </table>
        <br>
        <a href="liste_autorisations.php">Retour à la liste des autorisations</a>
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

<?php
    } else {
        // Si aucune autorisation correspondante n'est trouvée
        echo "Aucune autorisation trouvée pour le code : " . htmlspecialchars($code);
    }
} else {
    // Si le paramètre "code" n'est pas spécifié dans l'URL
    echo "Code d'autorisation non spécifié.";
}
?>
