<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        body {
            padding: 20px;
        }

        .sidebar {
            margin-right: 20px;
        }

        .content {
            margin-left: 0px; /* 300px sidebar width + 20px margin */
        }

        .form-container {
            margin-top: 50px; /* Adjust as needed */
            width: 250%;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <?php include('../../partials/sidebar.php'); ?>
    </div>

    <div class="content ">
        <?php
        if (isset($_GET['detenu'])) {
            $detenu = $_GET['detenu'];
        }
        ?>

        <?php if (isset($detenu)) { ?>
            <div class="form-container">
                <form method="post" action="../../controllers/detenuController.php">
                    <input type="hidden" name="idDetenu" value="<?= $detenu['idDetenu'] ?>">
                    <div class="form-group">
                        <label for="codePrison">Code Prison</label>
                        <input type="text" class="form-control" id="codePrison" name="codePrison" value="<?php echo isset($detenu['codePrison']) ? htmlspecialchars($detenu['codePrison']) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Transferer" name="sub">
                    </div>
                </form>
            </div>
        <?php } else { ?>
            <div class="form-container">
                <form method="post" action="../../controllers/detenuController.php">
                    <input type="hidden" name="idDetenu" value="<?php echo isset($_GET['idDetenu']) ? htmlspecialchars($_GET['idDetenu']) : ''; ?>">
                    <div class="form-group">
                        <label for="codePrison">Code Prison</label>
                        <input type="text" class="form-control" id="codePrison" name="codePrison" value="<?php echo isset($_GET['codePrison']) ? htmlspecialchars($_GET['codePrison']) : ''; ?>">
                        <?php if (isset($_GET['error_codePrison'])) echo "<p style='color: red;'>" . $_GET['error_codePrison'] . "</p>"; ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Transferer" name="sub">
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
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
