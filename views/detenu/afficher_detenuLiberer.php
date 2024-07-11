<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher personne liberee</title>
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
     <link rel="stylesheet" href="./cssDetenu/liberer.css">
    <link href="../../partials/assets/css/style.css" rel="stylesheet">
    <link href="../../partials/assets/css/custom-style.css" rel="stylesheet"> <!-- Lien vers le fichier CSS personnalisé -->
</head>

<body>
    <div class="sidebar">
        <?php include('../../partials/sidebar.php'); ?>
    </div>
    <div class="main-content">
        <?php
        require_once(__DIR__ . '/../../dao/DetenuDao.php');
        $detenuDao = new DetenuDao();
        $detenus = $detenuDao->displayAllLib();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_POST['idDetenu']) || empty(trim($_POST['idDetenu']))) {
        ?>
                <p class="error-message">Le champ est requis</p>

                <?php
            } else {
                $id = htmlspecialchars(trim($_POST['idDetenu']));
                $det = $detenuDao->search($id);
                if ($det == null) {
                    if ((count($detenus) > 0) && $detenus != null) { ?>
                        <h1>Liste des Personnes liberees</h1>
                        <table class="detenu-table">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>CIN/NIF</th>
                                    <th>Sexe</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($detenus as $detenu) {
                                $date = new DateTime($detenu->getDateArrestation());
                                $dateSimple = $date->format('d-m-Y');
                                echo "<tr>";
                                echo "<td>" . $detenu->getCode() . "</td>";
                                echo "<td>" . $detenu->getNom() . "</td>";
                                echo "<td>" . $detenu->getPrenom() . "</td>";
                                echo "<td>" . $detenu->getCin_nif() . "</td>";
                                echo "<td>" . $detenu->getSexe() . "</td>";
                                echo "<td>" . $detenu->getAdresse() . "</td>";
                                echo "<td>" . $detenu->getTelephone() . "</td>";
                                echo "<td>" . $detenu->getStatut() . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<p>Aucune personne</p>";
                        }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        if ($det->getCode() != null) {
                        ?>
                            <h1>Liste des Détenus</h1>
                            <table class="detenu-table">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>CIN/NIF</th>
                                        <th>Sexe</th>
                                        <th>Adresse</th>
                                        <th>Téléphone</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $date = new DateTime($det->getDateArrestation());
                                    $dateSimple = $date->format('d-m-Y');
                                    echo "<tr>";
                                    echo "<td>" . $det->getCode() . "</td>";
                                    echo "<td>" . $det->getNom() . "</td>";
                                    echo "<td>" . $det->getPrenom() . "</td>";
                                    echo "<td>" . $det->getCin_nif() . "</td>";
                                    echo "<td>" . $det->getSexe() . "</td>";
                                    echo "<td>" . $det->getAdresse() . "</td>";
                                    echo "<td>" . $det->getTelephone() . "</td>";
                                    echo "<td>" . $det->getStatut() . "</td>";
                                    echo "</tr>";
                                    ?>
                                </tbody>
                            </table>
                <?php
                        } else {
                            echo "<p class='error-message'>Numero de detenu introuvable</p>";
                        }
                    }
                }
            } else {
                ?>
                <?php
                if ((count($detenus) > 0) && $detenus != null) { ?>
                    <h1>Liste des Détenus</h1>
                    <table class="detenu-table">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>CIN/NIF</th>
                                <th>Sexe</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($detenus as $detenu) {
                                $date = new DateTime($detenu->getDateArrestation());
                                $dateSimple = $date->format('d-m-Y');
                                echo "<tr>";
                                echo "<td>" . $detenu->getCode() . "</td>";
                                echo "<td>" . $detenu->getNom() . "</td>";
                                echo "<td>" . $detenu->getPrenom() . "</td>";
                                echo "<td>" . $detenu->getCin_nif() . "</td>";
                                echo "<td>" . $detenu->getSexe() . "</td>";
                                echo "<td>" . $detenu->getAdresse() . "</td>";
                                echo "<td>" . $detenu->getTelephone() . "</td>";
                                echo "<td>" . $detenu->getStatut() . "</td>";
                                echo "</tr>";
                            }
                        } else { ?>
                            <p>Aucune personne</p>;
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                <?php } ?>
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
    </div>
</body>

</html>
