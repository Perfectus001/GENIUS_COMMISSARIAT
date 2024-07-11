<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer Detenu</title>

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
    <link rel="stylesheet" href="./cssDetenu/style.css">

    <style>
        .form-container {
            padding: 20px;
        }
        @media (min-width: 992px) {
            .form-container {
                margin-left: 250px; /* Adjust this value according to your sidebar width */
            }
        }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar">
        <?php include('../../partials/sidebar.php'); ?>
    </div>
    <div class="container mt-3 form-container">
        <form method="post" action="../../controllers/detenuController.php">
            <div class="row">
                <div class="form-group col-12 mb-3">
                    <label for="nom">NOM</label>
                    <input type="text" class="form-control" name="nom" id="nom" value="<?php echo isset($_GET['nom']) ? htmlspecialchars($_GET['nom']) : ''; ?>">
                    <?php if (isset($_GET['error_nom'])) echo "<div class='text-danger'>" . $_GET['error_nom'] . "</div>"; ?>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="prenom">PRENOM</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo isset($_GET['prenom']) ? htmlspecialchars($_GET['prenom']) : ''; ?>">
                    <?php if (isset($_GET['error_prenom'])) echo "<div class='text-danger'>" . $_GET['error_prenom'] . "</div>"; ?>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="cin_nif">CIN_NIF</label>
                    <input type="text" class="form-control" name="cin_nif" id="cin_nif" value="<?php echo isset($_GET['cin_nif']) ? htmlspecialchars($_GET['cin_nif']) : ''; ?>"placeholder="xxx-xxx-xxxx ou xxxxxxxxxx">
                    <?php if (isset($_GET['error_cin_nif'])) echo "<div class='text-danger'>" . $_GET['error_cin_nif'] . "</div>"; ?>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="sexe">SEXE</label>
                    <select name="sexe" id="sexe" class="form-control">
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                    <?php if (isset($_GET['error_sexe'])) echo "<div class='text-danger'>" . $_GET['error_sexe'] . "</div>"; ?>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="adresse">ADRESSE</label>
                    <input type="text" class="form-control" name="adresse" id="adresse" value="<?php echo isset($_GET['adresse']) ? htmlspecialchars($_GET['adresse']) : ''; ?>">
                    <?php if (isset($_GET['error_adresse'])) echo "<div class='text-danger'>" . $_GET['error_adresse'] . "</div>"; ?>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="telephone">TELEPHONE</label>
                    <input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo isset($_GET['telephone']) ? htmlspecialchars($_GET['telephone']) : ''; ?>">
                    <?php if (isset($_GET['error_telephone'])) echo "<div class='text-danger'>" . $_GET['error_telephone'] . "</div>"; ?>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="infraction">INFRACTION</label>
                    <select name="infraction" id="infraction" class="form-control">
                        <option value="vol">VOL</option>
                        <option value="viol">VIOL</option>
                        <option value="assassinat">ASSASSINAT</option>
                        <option value="enlevement">ENLEVEMENT</option>
                        <option value="fraude">FRAUDE</option>
                        <option value="violence">VIOLENCE</option>
                        <option value="autre">AUTRE</option>
                    </select>
                    <?php if (isset($_GET['error_infraction'])) echo "<div class='text-danger'>" . $_GET['error_infraction'] . "</div>"; ?>
                </div>
            </div>
            <div><input type="submit" class="btn btn-primary" value="Enregistrer" name="sub"></div>
        </form>
    </div>
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
