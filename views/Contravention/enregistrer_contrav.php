<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer Contravention</title>
</head>
<body>
    <form method="post" action="../../controllers/ContraventionController.php">
        <div>
            <label for="nomProprio">Nom Propriétaire</label>
            <input type="text" name="nomProprio" id="nomProprio" value="<?php echo isset($_GET['nomProprio']) ? htmlspecialchars($_GET['nomProprio']) : ''; ?>">
            <br><?php if (isset($_GET['error_nomProprio'])) echo "<p style='color: red;'>".$_GET['error_nomProprio']."</p>"; ?>
        </div>
        <div>
            <label for="noPermit">Numéro de Permis</label>
            <input type="text" name="noPermit" id="noPermit" value="<?php echo isset($_GET['noPermit']) ? htmlspecialchars($_GET['noPermit']) : ''; ?>">
            <br><?php if (isset($_GET['error_noPermit'])) echo "<p style='color: red;'>".$_GET['error_noPermit']."</p>"; ?>
        </div>
        <div>
            <label for="noPlaque">Numéro de Plaque</label>
            <input type="text" name="noPlaque" id="noPlaque" value="<?php echo isset($_GET['noPlaque']) ? htmlspecialchars($_GET['noPlaque']) : ''; ?>">
            <br><?php if (isset($_GET['error_noPlaque'])) echo "<p style='color: red;'>".$_GET['error_noPlaque']."</p>"; ?>
        </div>
        <div>
            <label for="lieuContrav">Lieu de la Contravention</label>
            <input type="text" name="lieuContrav" id="lieuContrav" value="<?php echo isset($_GET['lieuContrav']) ? htmlspecialchars($_GET['lieuContrav']) : ''; ?>">
            <br><?php if (isset($_GET['error_lieuContrav'])) echo "<p style='color: red;'>".$_GET['error_lieuContrav']."</p>"; ?>
        </div>
        <div>
            <label for="noViolation">Numéro de Violation</label>
            <input type="text" name="noViolation" id="noViolation" value="<?php echo isset($_GET['noViolation']) ? htmlspecialchars($_GET['noViolation']) : ''; ?>">
            <br><?php if (isset($_GET['error_noViolation'])) echo "<p style='color: red;'>".$_GET['error_noViolation']."</p>"; ?>
        </div>
        <div>
            <label for="article">Article</label>
            <input type="text" name="article" id="article" value="<?php echo isset($_GET['article']) ? htmlspecialchars($_GET['article']) : ''; ?>">
            <br><?php if (isset($_GET['error_article'])) echo "<p style='color: red;'>".$_GET['error_article']."</p>"; ?>
        </div>
        <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="<?php echo isset($_GET['date']) ? htmlspecialchars($_GET['date']) : ''; ?>">
            <br><?php if (isset($_GET['error_date'])) echo "<p style='color: red;'>".$_GET['error_date']."</p>"; ?>
        </div>
        <div>
            <label for="heure">Heure</label>
            <input type="time" name="heure" id="heure" value="<?php echo isset($_GET['heure']) ? htmlspecialchars($_GET['heure']) : ''; ?>">
            <br><?php if (isset($_GET['error_heure'])) echo "<p style='color: red;'>".$_GET['error_heure']."</p>"; ?>
        </div>
        <div>
            <label for="noAgent">Numéro d'Agent</label>
            <input type="text" name="noAgent" id="noAgent" value="<?php echo isset($_GET['noAgent']) ? htmlspecialchars($_GET['noAgent']) : ''; ?>">
            <br><?php if (isset($_GET['error_noAgent'])) echo "<p style='color: red;'>".$_GET['error_noAgent']."</p>"; ?>
        </div>
        <div>
            <label for="noMatricule">Numéro de Matricule</label>
            <input type="text" name="noMatricule" id="noMatricule" value="<?php echo isset($_GET['noMatricule']) ? htmlspecialchars($_GET['noMatricule']) : ''; ?>">
            <br><?php if (isset($_GET['error_noMatricule'])) echo "<p style='color: red;'>".$_GET['error_noMatricule']."</p>"; ?>
        </div>
        <div><input type="submit" value="Enregistrer" name="sub"></div>
    </form>
</body>
</html>
