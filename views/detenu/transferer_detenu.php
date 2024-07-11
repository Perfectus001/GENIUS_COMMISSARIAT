<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding: 20px;
        }

        .sidebar {
            width: 300px;
            height: 614px;
            background-color: #f0f0f0;
            padding: 20px;
            float: left;
            margin-right: 20px;
        }

        .content {
            margin-left: 340px; /* 300px sidebar width + 20px margin */
        }

        .form-container {
            margin-top: 20px; /* Adjust as needed */
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <?php include('../../partials/sidebar.php'); ?>
    </div>

    <div class="content">
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
</body>

</html>
