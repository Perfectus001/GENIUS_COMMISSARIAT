<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Autorisation</title>
    <link rel="stylesheet" href="./css/add.css"> <!-- Ajustez le chemin vers votre fichier CSS -->
 
</head>
<body>
    <a href="liste_autorisations.php">Liste des Autorisations</a>
    <div class="form-container">
        <h1>Ajouter une Autorisation</h1>
        <form method="post" action="">
            <div class="form-row">
                <div class="form-group">
                    <label for="marque">Marque:</label>
                    <input type="text" name="marque" id="marque" placeholder="Ex: Toyota" value="<?= htmlspecialchars($_POST['marque'] ?? '') ?>" required>
                    <?php if (!empty($errors['marque'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['marque']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="modele">Modèle:</label>
                    <input type="text" name="modele" id="modele" placeholder="Ex: Corolla" value="<?= htmlspecialchars($_POST['modele'] ?? '') ?>" required>
                    <?php if (!empty($errors['modele'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['modele']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="serie">Série:</label>
                    <input type="text" name="serie" id="serie" placeholder="Ex: ABC123" value="<?= htmlspecialchars($_POST['serie'] ?? '') ?>" required>
                    <?php if (!empty($errors['serie'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['serie']) ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="no_moteur">No Moteur:</label>
                    <input type="text" name="no_moteur" id="no_moteur" placeholder="Ex: 1NZ-FE" value="<?= htmlspecialchars($_POST['no_moteur'] ?? '') ?>" required>
                    <?php if (!empty($errors['no_moteur'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['no_moteur']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="couleur">Couleur:</label>
                    <input type="text" name="couleur" id="couleur" placeholder="Ex: Rouge" value="<?= htmlspecialchars($_POST['couleur'] ?? '') ?>" required>
                    <?php if (!empty($errors['couleur'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['couleur']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" name="type" id="type" placeholder="Ex: Berline" value="<?= htmlspecialchars($_POST['type'] ?? '') ?>" required>
                    <?php if (!empty($errors['type'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['type']) ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="nombre_cylindre">Nombre de Cylindres:</label>
                    <input type="number" name="nombre_cylindre" id="nombre_cylindre" placeholder="Ex: 4" value="<?= htmlspecialchars($_POST['nombre_cylindre'] ?? '') ?>" required>
                    <?php if (!empty($errors['nombre_cylindre'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['nombre_cylindre']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="annee">Année:</label>
                    <input type="number" name="annee" id="annee" placeholder="Ex: 2020" value="<?= htmlspecialchars($_POST['annee'] ?? '') ?>" required>
                    <?php if (!empty($errors['annee'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['annee']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="puissance">Puissance:</label>
                    <input type="number" name="puissance" id="puissance" placeholder="Ex: 130" value="<?= htmlspecialchars($_POST['puissance'] ?? '') ?>" required>
                    <?php if (!empty($errors['puissance'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['puissance']) ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="no_plaque">No Plaque:</label>
                    <input type="text" name="no_plaque" id="no_plaque" placeholder="Ex: ABC1234" value="<?= htmlspecialchars($_POST['no_plaque'] ?? '') ?>" required>
                    <?php if (!empty($errors['no_plaque'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['no_plaque']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="nom_proprietaire">Nom du Propriétaire:</label>
                    <input type="text" name="nom_proprietaire" id="nom_proprietaire" placeholder="Ex: Dupont" value="<?= htmlspecialchars($_POST['nom_proprietaire'] ?? '') ?>" required>
                    <?php if (!empty($errors['nom_proprietaire'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['nom_proprietaire']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="prenom_proprietaire">Prénom du Propriétaire:</label>
                    <input type="text" name="prenom_proprietaire" id="prenom_proprietaire" placeholder="Ex: Jean" value="<?= htmlspecialchars($_POST['prenom_proprietaire'] ?? '') ?>" required>
                    <?php if (!empty($errors['prenom_proprietaire'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['prenom_proprietaire']) ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="nif_cin">NIF/CIN:</label>
                    <input type="text" name="nif_cin" id="nif_cin" placeholder="Ex: 1234567890" value="<?= htmlspecialchars($_POST['nif_cin'] ?? '') ?>" required>
                    <?php if (!empty($errors['nif_cin'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['nif_cin']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="adresse">Adresse:</label>
                    <input type="text" name="adresse" id="adresse" placeholder="Ex: 123 Rue de Paris" value="<?= htmlspecialchars($_POST['adresse'] ?? '') ?>" required>
                    <?php if (!empty($errors['adresse'])): ?>
                        <div class="error"><?= htmlspecialchars($errors['adresse']) ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <input type="submit" class="submit-btn" value="Ajouter">
        </form>
    </div>
</body>
</html>
