<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Detenu</title>
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

    <link rel="stylesheet" href="./cssDetenu/style.css">

    <!-- Template Main CSS File -->
    <link href="../../partials/assets/css/style.css" rel="stylesheet">

    <style>
        .form-container {
            padding: 20px;
        }

        @media (min-width: 992px) {
            .form-container {
                margin-left: 250px;
                /* Adjust this value according to your sidebar width */
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
        <?php
        if (isset($_GET['detenu'])) {
            $detenu = $_GET['detenu'];
        }
        ?>

        <?php if (isset($detenu)) { ?>
            <form method="post" action="../../controllers/detenuController.php">
                <input type="hidden" name="idDetenu" value="<?= $detenu['idDetenu'] ?> ">
                <div class="form-group col-12 mb-3">
                    <label for="nom">NOM</label>
                    <input type="text" class="form-control" name="nom" id="nom" value="<?php echo isset($detenu['nom']) ? htmlspecialchars($detenu['nom']) : ''; ?>">
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="prenom">PRENOM</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo isset($detenu['prenom']) ? htmlspecialchars($detenu['prenom']) : ''; ?>">
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="cin_nif">CIN_NIF</label>
                    <input type="text" class="form-control" name="cin_nif" id="cin_nif" value="<?php echo isset($detenu['cin_nif']) ? htmlspecialchars($detenu['cin_nif']) : ''; ?>">
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="sexe">SEXE</label>
                    <select name="sexe" id="sexe" class="form-control">
                        <option value="M" <?= ($detenu['sexe'] == 'M') ? "selected" : ''; ?>>M</option>
                        <option value="F" <?= ($detenu['sexe'] == 'F') ? 'selected' : '' ?>>F</option>
                    </select>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="adresse">ADRESSE</label>
                    <input type="text" class="form-control" name="adresse" id="adresse" value="<?php echo isset($detenu['adresse']) ? htmlspecialchars($detenu['adresse']) : ''; ?>">
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="telephone">TELEPHONE</label>
                    <input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo isset($detenu['telephone']) ? htmlspecialchars($detenu['telephone']) : ''; ?>">
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="infraction">INFRACTION</label>
                    <select name="infraction" id="infraction" class="form-control">
                        <option value="vol" <?= ($detenu['infraction'] == 'vol') ? 'selected' : '' ?>>VOL</option>
                        <option value="viol" <?= ($detenu['infraction'] == 'viol') ? 'selected' : '' ?>>VIOL</option>
                        <option value="assassinat" <?= ($detenu['infraction'] == 'assassinat') ? 'selected' : '' ?>>ASSASSINAT</option>
                        <option value="enlevement" <?= ($detenu['infraction'] == 'enlevement') ? 'selected' : '' ?>>ENLEVEMENT</option>
                        <option value="fraude" <?= ($detenu['infraction'] == 'fraude') ? 'selected' : '' ?>>FRAUDE</option>
                        <option value="violence" <?= ($detenu['infraction'] == 'violence') ? 'selected' : '' ?>>VIOLENCE</option>
                        <option value="autre" <?= ($detenu['infraction'] == 'autre') ? 'selected' : '' ?>>AUTRE</option>
                    </select>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="codePrison">CODE PRISON</label>
                    <input type="text" class="form-control" name="codePrison" id="codePrison" value="<?php echo isset($detenu['codePrison']) ? htmlspecialchars($detenu['codePrison']) : ''; ?>">
                </div>
                <div><input type="submit" class="btn btn-primary" value="Modifier" name="sub"></div>
            </form>
        <?php } else { ?>
            <form method="post" action="../../controllers/detenuController.php">
                <input type="hidden" name="idDetenu" value="<?php echo isset($_GET['idDetenu']) ? htmlspecialchars($_GET['idDetenu']) : ''; ?>">
                <div class="form-group col-12 mb-3">
                    <label for="nom">NOM</label>
                    <input type="text" class="form-control" name="nom" id="nom" value="<?php echo isset($_GET['nom']) ? htmlspecialchars($_GET['nom']) : ''; ?>">
                    <br><?php if (isset($_GET['error_nom'])) echo "<div class='text-danger'>" . $_GET['error_nom'] . "</div>"; ?>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="prenom">PRENOM</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo isset($_GET['prenom']) ? htmlspecialchars($_GET['prenom']) : ''; ?>">
                    <br><?php if (isset($_GET['error_prenom'])) echo "<div class='text-danger'>" . $_GET['error_prenom'] . "</div>"; ?>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="cin_nif">CIN_NIF</label>
                    <input type="text" class="form-control" name="cin_nif" id="cin_nif" value="<?php echo isset($_GET['cin_nif']) ? htmlspecialchars($_GET['cin_nif']) : ''; ?>">
                    <br><?php if (isset($_GET['error_cin_nif'])) echo "<div class='text-danger'>" . $_GET['error_cin_nif'] . "</div>"; ?>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="sexe">SEXE</label>
                    <select name="sexe" id="sexe" class="form-control">
                        <option value="M" <?= ($_GET['sexe'] == 'M') ? "selected" : ''; ?>>M</option>
                        <option value="F" <?= ($_GET['sexe'] == 'F') ? 'selected' : '' ?>>F</option>
                    </select>
                    <br><?php if (isset($_GET['error_sexe'])) echo "<div class='text-danger'>" . $_GET['error_sexe'] . "</div>"; ?>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="adresse">ADRESSE</label>
                    <input type="text" class="form-control" name="adresse" id="adresse" value="<?php echo isset($_GET['adresse']) ? htmlspecialchars($_GET['adresse']) : ''; ?>">
                    <br><?php if (isset($_GET['error_adresse'])) echo "<div class='text-danger'>" . $_GET['error_adresse'] . "</div>"; ?>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="telephone">TELEPHONE</label>
                    <input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo isset($_GET['telephone']) ? htmlspecialchars($_GET['telephone']) : ''; ?>">
                    <br><?php if (isset($_GET['error_telephone'])) echo "<div class='text-danger'>" . $_GET['error_telephone'] . "</div>"; ?>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="infraction">INFRACTION</label>
                    <select name="infraction" id="infraction" class="form-control">
                        <option value="vol" <?= ($_GET['infraction'] == 'vol') ? 'selected' : '' ?>>VOL</option>
                        <option value="viol" <?= ($_GET['infraction'] == 'viol') ? 'selected' : '' ?>>VIOL</option>
                        <option value="assassinat" <?= ($_GET['infraction'] == 'assassinat') ? 'selected' : '' ?>>ASSASSINAT</option>
                        <option value="enlevement" <?= ($_GET['infraction'] == 'enlevement') ? 'selected' : '' ?>>ENLEVEMENT</option>
                        <option value="fraude" <?= ($_GET['infraction'] == 'fraude') ? 'selected' : '' ?>>FRAUDE</option>
                        <option value="violence" <?= ($_GET['infraction'] == 'violence') ? 'selected' : '' ?>>VIOLENCE</option>
                        <option value="autre" <?= ($_GET['infraction'] == 'autre') ? 'selected' : '' ?>>AUTRE</option>
                    </select>
                    <br><?php if (isset($_GET['error_infraction'])) echo "<div class='text-danger'>" . $_GET['error_infraction'] . "</div>"; ?>
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="codePrison">CODE PRISON</label>
                    <input type="text" class="form-control" name="codePrison" id="codePrison" value="<?php echo isset($_GET['codePrison']) ? htmlspecialchars($_GET['codePrison']) : ''; ?>">
                    <br><?php if (isset($_GET['error_codePrison'])) echo "<div class='text-danger'>" . $_GET['error_codePrison'] . "</div>"; ?>
                </div>
                <div><input type="submit" class="btn btn-primary" value="Modifier" name="sub"></div>
            </form>
        <?php } ?>
    </div>
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