<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche détenu</title>
    <link href="../../partials/assets/img/favicon.png" rel="icon">
    <link href="../../partials/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../partials/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../partials/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../partials/assets/css/style.css" rel="stylesheet">
    <style>
        .main-content {
            margin-left: 250px; /* Ajuster la marge pour éviter le chevauchement avec la sidebar */
            padding: 20px;
        }
        .card {
            max-width: 600px; /* Réduire la largeur de la card */
            margin: 20px auto; /* Centrer la card */
        }
        @media (max-width: 991.98px) {
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <?php include('../../partials/sidebar.php'); ?>
    </div>

    <div class="main-content">
        <?php
            require_once(__DIR__ . '/../../dao/DetenuDao.php');
            $detenuDao = new DetenuDao();

            if (isset($_GET['code'])) {
                $code = $_GET['code'];

                $detenu = $detenuDao->search($code);

                if($detenu == null){
                    echo "<div class='alert alert-warning'>Détenu introuvable</div>";
                } else {
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Détails du détenu</h5>
                            <div class="card-content">
                                <p><strong>NOM:</strong> <?= htmlspecialchars($detenu->getNom()) ?> </p>
                                <p><strong>PRENOM:</strong> <?= htmlspecialchars($detenu->getPreNom()) ?> </p>
                                <p><strong>CIN|NIF:</strong> <?= htmlspecialchars($detenu->getCin_nif()) ?> </p>
                                <p><strong>SEXE:</strong> <?= htmlspecialchars($detenu->getSexe()) ?> </p>
                                <p><strong>ADRESSE:</strong> <?= htmlspecialchars($detenu->getAdresse()) ?> </p>
                                <p><strong>TELEPHONE:</strong> <?= htmlspecialchars($detenu->getTelephone()) ?> </p>
                                <p><strong>INFRACTION:</strong> <?= htmlspecialchars($detenu->getInfraction()) ?> </p>
                                <p><strong>STATUT:</strong> <?= htmlspecialchars($detenu->getStatut()) ?> </p>
                                <p><strong>PRISON:</strong> <?= $detenu->getCodePrison() ? htmlspecialchars($detenu->getCodePrison()) : 'Commissariat' ?> </p>
                                <?php 
                                    $date = new DateTime($detenu->getDateArrestation());
                                    $dateSimple = $date->format('d-m-Y');
                                ?>
                                <p><strong>DATE ARRESTATION:</strong> <?= $dateSimple ?></p>
                            </div>
                            <?php 
                                $date = new DateTime($detenu->getDateArrestation());
                                $dateSimple = $date->format('d-m-Y');

                                $detArray = [
                                    ''=>'',
                                    'idDetenu' => $detenu->getCode(),
                                    'nom'=> $detenu->getNom(),
                                    'prenom'=> $detenu->getprenom(),
                                    'cin_nif'=> $detenu->getCin_nif(),
                                    'sexe'=> $detenu->getSexe(),
                                    'adresse'=> $detenu->getAdresse(),
                                    'telephone'=> $detenu->getTelephone(),
                                    'infraction'=> $detenu->getInfraction(),
                                    'statut'=> $detenu->getStatut(),
                                    'codePrison'=> $detenu->getCodePrison(),
                                    'dateArrestation'=> $detenu->getDateArrestation(),
                                    'etat'=> $detenu->getEtat(),
                                ];

                                $queryString = http_build_query(['detenu' => $detArray]);
                            ?>

                            <div class="mt-3">
                                <a href="modifier_detenu.php?detenu=<?= $queryString ?>" class="btn btn-link">
                                    <i class="bi bi-pencil-square"></i> Modifier
                                </a>
                                <a href="../../controllers/detenuController.php?choix=sup&code=<?= htmlspecialchars($detenu->getCode()) ?>" class="btn btn-link">
                                    <i class="bi bi-trash"></i> Supprimer
                                </a>
                                <a href="transferer_detenu.php?detenu=<?= $queryString ?>" class="btn btn-link">
                                    <i class="bi bi-arrow-right-square"></i> Transfert
                                </a>
                                <a href="../../controllers/detenuController.php?&choix=lib&code=<?= htmlspecialchars($detenu->getCode()) ?>" class="btn btn-link">
                                    <i class="bi bi-door-open"></i> Libérer
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
        ?>
    </div>

    <!-- Vendor JS Files -->
    <script src="../../partials/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="../../partials/assets/js/main.js"></script>
</body>
</html>
