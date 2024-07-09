<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Detenu</title>
</head>
<body>
    <?php
    if (isset($_GET['detenu'])) {
        $detenu = $_GET['detenu'];
    }
    ?>

    <?php if(isset($detenu)){?>
        <form method="post" action="../../controllers/detenuController.php">
        <input type="hidden" name="idDetenu" value="<?= $detenu['idDetenu'] ?>">
        <div>
            <label for="nom">NOM</label>
            <input type="text" name="nom" id="nom" value="<?php echo isset($detenu['nom']) ? htmlspecialchars($detenu['nom']) :''; ?>">
        </div>
        <div>
            <label for="prenom">PRENOM</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo isset($detenu['prenom']) ? htmlspecialchars($detenu['prenom']) : ''; ?>">
        </div>
        <div>
            <label for="cin_nif">CIN_NIF</label>
            <input type="text" name="cin_nif" id="cin_nif" value="<?php echo isset($detenu['cin_nif']) ? htmlspecialchars($detenu['cin_nif']) : ''; ?>">
        </div>
        <div>
            <label for="sexe">SEXE</label>
            <select name="sexe" id="sexe">
                <option value="M" <?=  ($detenu['sexe'] == 'M') ? "selected" : '' ; ?>>M</option>
                <option value="F" <?= ($detenu['sexe'] == 'F') ? 'selected' : '' ?>>F</option>
            </select>
        </div>
        <div>
            <label for="adresse">ADRESSE</label>
            <input type="text" name="adresse" id="adresse" value="<?php echo isset($detenu['adresse']) ? htmlspecialchars($detenu['adresse']) : ''; ?>">
        </div>
        <div>
            <label for="telephone">TELEPHONE</label>
            <input type="text" name="telephone" id="telephone" value="<?php echo isset($detenu['telephone']) ? htmlspecialchars($detenu['telephone']) : ''; ?>">
        </div>
        <div>
            <label for="infraction">INFRACTION</label>
            <select name="infraction" id="infraction">
                <option value="vol" <?= ($detenu['infraction'] == 'vol') ? 'selected' : '' ?>>VOL</option>
                <option value="viol" <?= ($detenu['infraction'] == 'viol') ? 'selected' : '' ?>>VIOL</option>
                <option value="assassinat" <?= ($detenu['infraction'] == 'assassinat') ? 'selected' : '' ?>>ASSASSINAT</option>
                <option value="enlevement" <?= ($detenu['infraction'] == 'enlevement') ? 'selected' : '' ?>>ENLEVEMENT</option>
                <option value="fraude" <?= ($detenu['infraction'] == 'fraude') ? 'selected' : '' ?>>FRAUDE</option>
                <option value="violence" <?= ($detenu['infraction'] == 'violence') ? 'selected' : '' ?>>VIOLENCE</option>
                <option value="autre" <?= ($detenu['infraction'] == 'autre') ? 'selected' : '' ?>>AUTRE</option>
            </select>
        </div>
        <div>
            <label for="codePrison">code prison</label>
            <input type="text" name="codePrison" id="codePrison" value="<?php echo isset($detenu['codePrison']) ? htmlspecialchars($detenu['codePrison']) : ''; ?>">
        </div>
        <!--<div>
            <label for="statut">STATUT</label>
            <select name="statut" id="statut">
                <option value="liberer">LIBERER</option>
                <option value="incarcerer">INCARCERER</option>
            </select>
            <br><?php // if (isset($_GET['error_statut'])) echo "<p style='color: red;'>".$_GET['error_statut']."</p>"; ?>
        </div>-->
        <div><input type="submit" value="Modifier" name="sub"></div>
    </form>
    <?php }else{?>
        <form method="post" action="../../controllers/detenuController.php">
        <input type="hidden" name="idDetenu" value="<?php echo isset($_GET['idDetenu']) ? htmlspecialchars($_GET['idDetenu']) : ''; ?>">
        <div>
            <label for="nom">NOM</label>
            <input type="text" name="nom" id="nom" value="<?php echo isset($_GET['nom']) ? htmlspecialchars($_GET['nom']) : ''; ?>">
            <br><?php if (isset($_GET['error_nom'])) echo "<p style='color: red;'>".$_GET['error_nom']."</p>"; ?>
        </div>
        <div>
            <label for="prenom">PRENOM</label>
            <input type="text" name="prenom" id="prenom" value="<?php echo isset($_GET['prenom']) ? htmlspecialchars($_GET['prenom']) : ''; ?>">
            <br><?php if (isset($_GET['error_prenom'])) echo "<p style='color: red;'>".$_GET['error_prenom']."</p>"; ?>
        </div>
        <div>
            <label for="cin_nif">CIN_NIF</label>
            <input type="text" name="cin_nif" id="cin_nif" value="<?php echo isset($_GET['cin_nif']) ? htmlspecialchars($_GET['cin_nif']) : ''; ?>">
            <br><?php if (isset($_GET['error_cin_nif'])) echo "<p style='color: red;'>".$_GET['error_cin_nif']."</p>"; ?>
        </div>
        <div>
            <label for="sexe">SEXE</label>
            <select name="sexe" id="sexe">
                <option value="M" <?=  ($_GET['sexe'] == 'M') ? "selected" : '' ; ?>>M</option>
                <option value="F" <?= ($_GET['sexe'] == 'F') ? 'selected' : '' ?>>F</option>
            </select>
            <br><?php if (isset($_GET['error_sexe'])) echo "<p style='color: red;'>".$_GET['error_sexe']."</p>"; ?>
        </div>
        <div>
            <label for="adresse">ADRESSE</label>
            <input type="text" name="adresse" id="adresse" value="<?php echo isset($_GET['adresse']) ? htmlspecialchars($_GET['adresse']) : ''; ?>">
            <br><?php if (isset($_GET['error_adresse'])) echo "<p style='color: red;'>".$_GET['error_adresse']."</p>"; ?>
        </div>
        <div>
            <label for="telephone">TELEPHONE</label>
            <input type="text" name="telephone" id="telephone" value="<?php echo isset($_GET['telephone']) ? htmlspecialchars($_GET['telephone']) : ''; ?>">
            <br><?php if (isset($_GET['error_telephone'])) echo "<p style='color: red;'>".$_GET['error_telephone']."</p>"; ?>
        </div>
        <div>
            <label for="infraction">INFRACTION</label>
            <select name="infraction" id="infraction">
                <option value="vol" <?= ($_GET['infraction'] == 'F') ? 'selected' : '' ?>>VOL</option>
                <option value="viol" <?= ($_GET['infraction'] == 'F') ? 'selected' : '' ?>>VIOL</option>
                <option value="assassinat" <?= ($_GET['infraction'] == 'viol') ? 'assassinat' : '' ?>>ASSASSINAT</option>
                <option value="enlevement" <?= ($_GET['infraction'] == 'enlevement') ? 'selected' : '' ?>>ENLEVEMENT</option>
                <option value="fraude" <?= ($_GET['infraction'] == 'fraude') ? 'selected' : '' ?>>FRAUDE</option>
                <option value="violence" <?= ($_GET['infraction'] == 'violence') ? 'selected' : '' ?>>VIOLENCE</option>
                <option value="autre" <?= ($_GET['infraction'] == 'autre') ? 'selected' : '' ?>>AUTRE</option>
            </select>
            <br><?php if (isset($_GET['error_infraction'])) echo "<p style='color: red;'>".$_GET['error_infraction']."</p>"; ?>
        </div>
        <div>
            <label for="codePrison">CODE PRISON</label>
            <input type="text" name="codePrison" id="codePrison" value="<?php echo isset($_GET['codePrison']) ? htmlspecialchars($_GET['codePrison']) : ''; ?>">
            <br><?php if (isset($_GET['error_codePrison'])) echo "<p style='color: red;'>".$_GET['error_codePrison']."</p>"; ?>
        </div>
        <!--<div>
            <label for="statut">STATUT</label>
            <select name="statut" id="statut">
                <option value="liberer">LIBERER</option>
                <option value="incarcerer">INCARCERER</option>
            </select>
            <br><?php // if (isset($_GET['error_statut'])) echo "<p style='color: red;'>".$_GET['error_statut']."</p>"; ?>
        </div>-->
        <div><input type="submit" value="Modifier" name="sub"></div>
    <?php } ?>
</body>
</html>