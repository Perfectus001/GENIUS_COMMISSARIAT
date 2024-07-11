<?php
require_once(__DIR__ . '/../../controllers/AutorisationController.php');

// Initialiser le contrôleur
$controller = new AutorisationController();
$autorisation = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'];
    $autorisation = $controller->rechercherAutorisation($code);

    if (!$autorisation) {
        $error = "Aucune autorisation trouvée pour le code $code.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rechercher une Autorisation</title>
    <link rel="stylesheet" href="css/rechercherAu.css">
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
    
    <div class="container">
      
        <form method="post" action="">
            <label for="code">Code:</label>
            <input type="text" name="code" id="code" required>
            <input type="submit" value="Rechercher">
        </form>

        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php elseif ($autorisation): ?>
            <div class="details">
                <a class="imp" href="imprimer.php?code=<?php echo htmlspecialchars($autorisation->getCode()); ?>">Imprimer</a>
                <h2>Détails de l'Autorisation  </h2>
                <div class="details-grid">
                    <div class="detail-item"><strong>Code:</strong> <?php echo htmlspecialchars($autorisation->getCode()); ?></div>
                    <div class="detail-item"><strong>Marque:</strong> <?php echo htmlspecialchars($autorisation->getMarque()); ?></div>
                    <div class="detail-item"><strong>Modèle:</strong> <?php echo htmlspecialchars($autorisation->getModele()); ?></div>
                    <div class="detail-item"><strong>Série:</strong> <?php echo htmlspecialchars($autorisation->getSerie()); ?></div>
                    <div class="detail-item"><strong>No Moteur:</strong> <?php echo htmlspecialchars($autorisation->getNoMoteur()); ?></div>
                    <div class="detail-item"><strong>Couleur:</strong> <?php echo htmlspecialchars($autorisation->getCouleur()); ?></div>
                    <div class="detail-item"><strong>Type:</strong> <?php echo htmlspecialchars($autorisation->getType()); ?></div>
                    <div class="detail-item"><strong>Nombre de Cylindres:</strong> <?php echo htmlspecialchars($autorisation->getNombreCylindre()); ?></div>
                    <div class="detail-item"><strong>Année:</strong> <?php echo htmlspecialchars($autorisation->getAnnee()); ?></div>
                    <div class="detail-item"><strong>Puissance:</strong> <?php echo htmlspecialchars($autorisation->getPuissance()); ?></div>
                    <div class="detail-item"><strong>No Plaque:</strong> <?php echo htmlspecialchars($autorisation->getNoPlaque()); ?></div>
                    <div class="detail-item"><strong>Nom du Propriétaire:</strong> <?php echo htmlspecialchars($autorisation->getNomProprietaire()); ?></div>
                    <div class="detail-item"><strong>Prénom du Propriétaire:</strong> <?php echo htmlspecialchars($autorisation->getPrenomProprietaire()); ?></div>
                    <div class="detail-item"><strong>NIF/CIN:</strong> <?php echo htmlspecialchars($autorisation->getNifCin()); ?></div>
                    <div class="detail-item"><strong>Adresse:</strong> <?php echo htmlspecialchars($autorisation->getAdresse()); ?></div>
                </div>
                <td>
   
</td>

            </div>
        <?php endif; ?>
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
