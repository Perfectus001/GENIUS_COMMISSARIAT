<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    $values = [];

    // Vérification du champ 'nom'
    if (!isset($_POST['nom']) || empty(trim($_POST['nom']))) {
        $errors['error_nom'] = "Le champ Nom est requis.";
    } else {
        $values['nom'] = htmlspecialchars(trim($_POST['nom']));
    }

    // Vérification du champ 'prenom'
    if (!isset($_POST['prenom']) || empty(trim($_POST['prenom']))) {
        $errors['error_prenom'] = "Le champ Prenom est requis.";
    } else {
        $values['prenom'] = htmlspecialchars(trim($_POST['prenom']));
    }

    // Vérification du champ 'prenom'
    if (!isset($_POST['cin_nif']) || empty(trim($_POST['cin_nif']))) {
        $errors['error_cin_nif'] = "Le champ cin|nif est requis.";
    } else {
        $values['cin_nif'] = htmlspecialchars(trim($_POST['cin_nif']));
    }

    // Vérification du champ 'sexe'
    if (!isset($_POST['sexe']) || empty(trim($_POST['sexe']))) {
        $errors['error_sexe'] = "Le champ Sexe est requis.";
    } else {
        $values['sexe'] = htmlspecialchars(trim($_POST['sexe']));
    }

    // Vérification du champ 'adresse'
    if (!isset($_POST['adresse']) || empty(trim($_POST['adresse']))) {
        $errors['error_adresse'] = "Le champ Adresse est requis.";
    } else {
        $values['adresse'] = htmlspecialchars(trim($_POST['adresse']));
    }

    // Vérification du champ 'telephone'
    if (!isset($_POST['telephone']) || empty(trim($_POST['telephone']))) {
        $errors['error_telephone'] = "Le champ Telephone est requis.";
    } else {
        $values['telephone'] = htmlspecialchars(trim($_POST['telephone']));
    }

    // Vérification du champ 'infraction'
    if (!isset($_POST['infraction']) || empty(trim($_POST['infraction']))) {
        $errors['error_infraction'] = "Le champ Infraction est requis.";
    } else {
        $values['infraction'] = htmlspecialchars(trim($_POST['infraction']));
    }

    // Vérification du champ 'prenom'
    if (!isset($_POST['statut']) || empty(trim($_POST['statut']))) {
        $errors['error_statut'] = "Le champ Statut est requis.";
    } else {
        $values['statut'] = htmlspecialchars(trim($_POST['statut']));
    }

    if(!empty($errors)) {
        $query = http_build_query(array_merge($errors, $values));
        header("Location: enregistrement_detenu.php?$query");
        exit();
    } else {

        header("Location: confirmation.php");
        exit();
    }
}