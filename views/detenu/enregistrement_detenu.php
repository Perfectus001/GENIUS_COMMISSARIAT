<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer Detenu</title>
</head>
<body>
    <form method="post" action="../../controllers/detenuController.php">
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
                <option value="M">M</option>
                <option value="F">F</option>
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
                <option value="vol">VOL</option>
                <option value="viol">VIOL</option>
                <option value="assassinat">ASSASSINAT</option>
                <option value="enlevement">ENLEVEMENT</option>
                <option value="fraude">FRAUDE</option>
                <option value="violence">VIOLENCE</option>
                <option value="autre">AUTRE</option>
            </select>
            <br><?php if (isset($_GET['error_infraction'])) echo "<p style='color: red;'>".$_GET['error_infraction']."</p>"; ?>
        </div>
        <!--<div>
            <label for="statut">STATUT</label>
            <select name="statut" id="statut">
                <option value="liberer">LIBERER</option>
                <option value="incarcerer">INCARCERER</option>
            </select>
            <br><?php // if (isset($_GET['error_statut'])) echo "<p style='color: red;'>".$_GET['error_statut']."</p>"; ?>
        </div>-->
        <div><input type="submit" value="Enregistrer" name="sub"></div>
    </form>
</body>
</html>