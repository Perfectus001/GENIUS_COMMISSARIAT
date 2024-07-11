<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher Contravention</title>
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
    <link href="./css/voir.css" rel="stylesheet"> <!-- Lien vers le fichier CSS personnalisé -->
</head>
<body>
<div class="sidebar">
    <?php include('../../partials/sidebar.php'); ?>
</div>
<div class="container">
    <?php
        require_once(__DIR__ . '/../../dao/ContraventionDao.php');
        $contraventionDao = new ContraventionDao();

        if (isset($_GET['code'])) {
            $code= $_GET['code'];

            $contravention = $contraventionDao->search($code);

            if ($contravention == null) {
                echo "Contravention introuvable";
            } else {
                ?>
                <div class="content">
                    <p>Nom Propriétaire: <?= $contravention->getNomProprio() ?> </p>
                    <p>Numéro de Permis: <?= $contravention->getNoPermit() ?> </p>
                    <p>Numéro de Plaque: <?= $contravention->getNoPlaque() ?> </p>
                    <p>Lieu de la Contravention: <?= $contravention->getLieuContrav() ?> </p>
                    <p>Numéro de Violation: <?= $contravention->getNoViolation() ?> </p>
                    <p>Article: <?= $contravention->getArticle() ?> </p>
                    <p>Date: <?= $contravention->getDate() ?> </p>
                    <p>Heure: <?= $contravention->getHeure() ?> </p>
                    <p>Numéro d'Agent: <?= $contravention->getNoAgent() ?> </p>
                    <p>Numéro de Matricule: <?= $contravention->getNoMatricule() ?> </p>
                    <?php 

                    $contravArray = [
                        ''=>'',
                        'idContrav' => $contravention->getCode(),
                        'nomProprio'=> $contravention->getNomProprio(),
                        'noPermit'=> $contravention->getNoPermit(),
                        'noPlaque'=> $contravention->getNoPlaque(),
                        'lieuContrav'=> $contravention->getLieuContrav(),
                        'noViolation'=> $contravention->getNoViolation(),
                        'article'=> $contravention->getArticle(),
                        'date'=> $contravention->getDate(),
                        'heure'=> $contravention->getHeure(),
                        'noAgent'=> $contravention->getNoAgent(),
                        'noMatricule'=> $contravention->getNoMatricule(),
                    ];

                    $queryString = http_build_query(['contravention' => $contravArray]);
                    ?>

                    <br><br>
                    <a href="modifier_contrav.php?contravention=<?= $queryString ?>">Modifier</a> || 
                    <a href="../../controllers/contraventionController.php?choix=sup&code=<?= $contravention->getCode() ?>">Supprimer</a> ||
                    <a href="impression.php?contravention=<?= $queryString ?>">Imprimer</a>
                </div>
                <?php
            }
        }
    ?>
</div>
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
