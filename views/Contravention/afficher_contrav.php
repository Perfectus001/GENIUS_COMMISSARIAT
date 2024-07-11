<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Contravention</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
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
    <form action="" method="post">
        <div>
            <label for="idContravention">Id Contravention</label>
            <input type="text" id="idContravention" name="idContravention" />
        </div>
        <div>
            <input type="submit" value="Recherche">
        </div>
    </form>
    <?php
    require_once(__DIR__ . '/../../dao/ContraventionDao.php');
    $contraventionDao = new ContraventionDao();
    $contraventions = $contraventionDao->displayAll();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['idContravention']) || empty(trim($_POST['idContravention']))) {
    ?>
            <p style='color: red;'>Le champ est requis</p>

            <?php
        } else {
            $id = htmlspecialchars(trim($_POST['idContravention']));
            $contrav = $contraventionDao->search($id);
            if ($contrav == null) {
                if ((count($contraventions) > 0) && $contraventions != null) { ?>
                    <h1>Liste des Contraventions</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nom</th>
                                <th>No. Permit</th>
                                <th>No. Plaque</th>
                                <th>Lieu</th>
                                <th>No. Violation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($contraventions as $contravention) {
                            $date = new DateTime($contravention->getDate());
                            $dateSimple = $date->format('d-m-Y');
                            echo "<tr>";
                            echo "<td>" . $contravention->getCode() . "</td>";
                            echo "<td>" . $contravention->getNomProprio() . "</td>";
                            echo "<td>" . $contravention->getNoPermit() . "</td>";
                            echo "<td>" . $contravention->getNoPlaque() . "</td>";
                            echo "<td>" . $contravention->getLieuContrav() . "</td>";
                            echo "<td>" . $contravention->getNoViolation() . "</td>";
                            echo "<td><a href=rechercher_contrav.php?code=" . htmlspecialchars($contravention->getCode()) . ">Plus</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<p>Aucune contravention n'est enregistrée</p>";
                    }
                        ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    if ($contrav->getCode() != null) {
                    ?>
                        <h1>Liste des Contraventions</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>No. Permit</th>
                                    <th>No. Plaque</th>
                                    <th>Lieu</th>
                                    <th>No. Violation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $date = new DateTime($contrav->getDate());
                                $dateSimple = $date->format('d-m-Y');
                                echo "<tr>";
                                echo "<td>" . $contrav->getCode() . "</td>";
                                echo "<td>" . $contrav->getNomProprio() . "</td>";
                                echo "<td>" . $contrav->getNoPermit() . "</td>";
                                echo "<td>" . $contrav->getNoPlaque() . "</td>";
                                echo "<td>" . $contrav->getLieuContrav() . "</td>";
                                echo "<td>" . $contrav->getNoViolation() . "</td>";
                                echo "<td><a href=rechercher_contrav.php?code=" . htmlspecialchars($contrav->getCode()) . ">Plus</a></td>";
                                echo "</tr>";
                                ?>
                            </tbody>
                        </table>
            <?php
                    } else {
                        echo "<p style='color: red;'>Numéro de contravention introuvable</p>";
                    }
                }
            }
        } else {
            ?>
            <?php
            if ((count($contraventions) > 0) && $contraventions != null) { ?>
                <h1>Liste des Contraventions</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Nom</th>
                            <th>No. Permit</th>
                            <th>No. Plaque</th>
                            <th>Lieu</th>
                            <th>No. Violation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($contraventions as $contravention) {
                            $date = new DateTime($contravention->getDate());
                            $dateSimple = $date->format('d-m-Y');
                            echo "<tr>";
                            echo "<td>" . $contravention->getCode() . "</td>";
                            echo "<td>" . $contravention->getNomProprio() . "</td>";
                            echo "<td>" . $contravention->getNoPermit() . "</td>";
                            echo "<td>" . $contravention->getNoPlaque() . "</td>";
                            echo "<td>" . $contravention->getLieuContrav() . "</td>";
                            echo "<td>" . $contravention->getNoViolation() . "</td>";
                            echo "<td><a href=rechercher_contrav.php?code=" . htmlspecialchars($contravention->getCode()) . ">Plus</a></td>";
                            echo "</tr>";
                        }
                    } else { ?>
                        <p>Aucune contravention n'est enregistrée</p>;
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            <?php } ?>
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