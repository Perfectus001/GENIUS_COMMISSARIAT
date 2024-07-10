<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['detenu'])) {
        $detenu = $_GET['detenu'];
    }
    ?>

    <?php if (isset($detenu)) { ?>
        <form method="post" action="../../controllers/detenuController.php">
            <input type="hidden" name="idDetenu" value="<?= $detenu['idDetenu'] ?>">
            <div>
                <label for="codePrison">code prison</label>
                <input type="text" name="codePrison" id="codePrison" value="<?php echo isset($detenu['codePrison']) ? htmlspecialchars($detenu['codePrison']) : ''; ?>">
            </div>
            <div><input type="submit" value="Transferer" name="sub"></div>
        </form>
    <?php } else { ?>
        <form method="post" action="../../controllers/detenuController.php">
            <input type="hidden" name="idDetenu" value="<?php echo isset($_GET['idDetenu']) ? htmlspecialchars($_GET['idDetenu']) : ''; ?>">
            <div>
                <label for="codePrison">CODE PRISON</label>
                <input type="text" name="codePrison" id="codePrison" value="<?php echo isset($_GET['codePrison']) ? htmlspecialchars($_GET['codePrison']) : ''; ?>">
                <br><?php if (isset($_GET['error_codePrison'])) echo "<p style='color: red;'>" . $_GET['error_codePrison'] . "</p>"; ?>
            </div>
            <div><input type="submit" value="Transferer" name="sub"></div>
        </form>
    <?php } ?>
</body>
</html>