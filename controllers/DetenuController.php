<?php
require_once(__DIR__ . '/../dao/dao_prison.php');
require_once(__DIR__ . '/../dao/DetenuDao.php');
require_once(__DIR__ . '/../models/Detenu.php');
require_once(__DIR__ . '/../models/Prison.php');

$detenu = new Detenu();
$detenuDao = new DetenuDao();
$prisonDao = new PrisonDAO();

if (isset($_GET['code'])) {
    // Récupérer la valeur de 'code' depuis l'URL
    $code = $_GET['code'];
    $action = $_GET['choix'];

    switch($action){
        case 'sup':{
            if($detenuDao->delete($code)){
                echo "Suppression effectuee avec succes";
                header("Location: ../views/detenu/afficher_detenu.php");
            exit();
            }else{
                echo "impossible";
            }
            break;
        }
        case 'lib':{
            if($detenuDao->liberer($code)){
                echo "Liberation effectuee avec succes";
                header("Location: ../views/detenu/afficher_detenu.php");
            exit();
            }else{
                echo "impossible";
            }
            break;
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $submit = $_POST['sub'];

    switch($submit){
        case "Enregistrer":{
            $errors = [];
            $values = [];

            // Vérification du champ 'nom'
            if (!isset($_POST['nom']) || empty(trim($_POST['nom']))) {
                $errors['error_nom'] = "Le champ Nom est requis.";
            } else {
                if(preg_match('/^[a-zA-Z]+([- ][a-zA-Z]+)*$/', htmlspecialchars(trim($_POST['nom'])))){
                    $values['nom'] = htmlspecialchars(trim($_POST['nom']));
                }else{
                    $errors['error_nom'] = "Une erreur s'est produite dans la recuperation [nom]";
                }
                
            }

            // Vérification du champ 'prenom'
            if (!isset($_POST['prenom']) || empty(trim($_POST['prenom']))) {
                $errors['error_prenom'] = "Le champ Prenom est requis.";
            } else {
                if(preg_match('/^[a-zA-Z]+([- ][a-zA-Z]+)*$/', htmlspecialchars(trim($_POST['prenom'])))){
                    $values['prenom'] = htmlspecialchars(trim($_POST['prenom']));
                }else{
                    $errors['error_prenom'] = "Une erreur s'est produite dans la recuperation [prenom]";
                }
            }

            // Vérification du champ 'cin_nif'
            if (!isset($_POST['cin_nif']) || empty(trim($_POST['cin_nif']))) {
                $errors['error_cin_nif'] = "Le champ cin|nif est requis.";
            } else {
                if(preg_match('/^\d{3}-\d{3}-\d{4}$|^\d{10}$/', htmlspecialchars(trim($_POST['cin_nif'])))){
                    $values['cin_nif'] = htmlspecialchars(trim($_POST['cin_nif']));
                }else{
                    $errors['error_cin_nif'] = "Une erreur s'est produite dans la recuperation [cin|nif]";
                }
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

            // Vérification du champ 'statut'
            /*if(!isset($_POST['statut'])){
                if (empty(trim($_POST['statut']))) {
                    $errors['error_statut'] = "Le champ Statut est requis.";
                } else {
                    $values['statut'] = htmlspecialchars(trim($_POST['statut']));
                }
            }*/

            if(!empty($errors)) {
                $query = http_build_query(array_merge($errors, $values));
                header("Location: ../views/detenu/enregistrement_detenu.php?$query");
                exit();
            } else {

                $detenu->setnom($values['nom']);
                $detenu->setPrenom($values['prenom']);
                $detenu->setCin_nif($values['cin_nif']);
                $detenu->setSexe($values['sexe']);
                $detenu->setAdresse($values['adresse']);
                $detenu->setTelephone($values['telephone']);
                $detenu->setInfraction($values['infraction']);
                //$detenu->setCodePrison($values['codePrison']);
                //$detenu->setStatut($values['statut']);

                if($detenuDao->save($detenu)){
                    header("Location: ../views/detenu/afficher_detenu.php");
                }else{
                    echo "Une erreur s'est produite";
                }
                exit();
            }
            break;
        }
        case "Modifier":{
            //------------modifier
            $errors = [];
            $values = [];
            $detenu = new Detenu();
            $detenuDao = new DetenuDao();
            $prisonDao = new PrisonDAO();

            if (!isset($_POST['idDetenu']) || empty(trim($_POST['idDetenu']))) {
                
            } else {
                $values['idDetenu'] = htmlspecialchars(trim($_POST['idDetenu']));
            }


            // Vérification du champ 'nom'
            if (!isset($_POST['nom']) || empty(trim($_POST['nom']))) {
                $errors['error_nom'] = "Le champ Nom est requis.";
            } else {
                if(preg_match('/^[a-zA-Z]+([- ][a-zA-Z]+)*$/', htmlspecialchars(trim($_POST['nom'])))){
                    $values['nom'] = htmlspecialchars(trim($_POST['nom']));
                }else{
                    $errors['error_nom'] = "Une erreur s'est produite dans la recuperation [nom]";
                }
                
            }

            // Vérification du champ 'prenom'
            if (!isset($_POST['prenom']) || empty(trim($_POST['prenom']))) {
                $errors['error_prenom'] = "Le champ Prenom est requis.";
            } else {
                if(preg_match('/^[a-zA-Z]+([- ][a-zA-Z]+)*$/', htmlspecialchars(trim($_POST['prenom'])))){
                    $values['prenom'] = htmlspecialchars(trim($_POST['prenom']));
                }else{
                    $errors['error_prenom'] = "Une erreur s'est produite dans la recuperation [prenom]";
                }
            }

            // Vérification du champ 'cin_nif'
            if (!isset($_POST['cin_nif']) || empty(trim($_POST['cin_nif']))) {
                $errors['error_cin_nif'] = "Le champ cin|nif est requis.";
            } else {
                if(preg_match('/^\d{3}-\d{3}-\d{4}$|^\d{10}$/', htmlspecialchars(trim($_POST['cin_nif'])))){
                    $values['cin_nif'] = htmlspecialchars(trim($_POST['cin_nif']));
                }else{
                    $errors['error_cin_nif'] = "Une erreur s'est produite dans la recuperation [cin|nif]";
                }
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

            // Vérification du champ 'statut'
            if(isset($_POST['codePrison'])){
                if (empty(trim($_POST['codePrison']))) {
                    $values['codePrison'] = null;
                } else {
                    if(preg_match('/^\d+$/', htmlspecialchars(trim($_POST['codePrison'])))){
                        $prison = $prisonDao->rechercherPrisons(htmlspecialchars(trim($_POST['codePrison'])));
                        
                        if($prison == null){
                            $errors['error_codePrison'] = "Une erreur s'est produite, Prison inexistant";
                        }else{
                            $totalDetenu = $detenuDao->nombreDetenu($prison->getCode());
                            if($totalDetenu < ($prison->getNombreCellules() * $prison->getNombrePlacesParCellule())){
                                $values['codePrison'] = htmlspecialchars(trim($_POST['codePrison']));
                            }else{
                                $errors['error_codePrison'] = "Une erreur s'est produite, La prison n'a plus de place";
                            }
                        }
                        $values['codePrison'] = htmlspecialchars(trim($_POST['codePrison']));
                    }else{
                        $errors['error_codePrison'] = "Une erreur s'est produite dans la recuperation de la code";
                    }
                }
            }else{
                $errors['error_codePrison'] = "Une erreur s'est produite dans la recuperation de la code";
            }

            if(!empty($errors)) {
                $query = http_build_query(array_merge($errors, $values));
                header("Location: ../views/detenu/modifier_detenu.php?$query");
                exit();
            } else {

                $detenu->setCode($values['idDetenu']);
                $detenu->setnom($values['nom']);
                $detenu->setPrenom($values['prenom']);
                $detenu->setCin_nif($values['cin_nif']);
                $detenu->setSexe($values['sexe']);
                $detenu->setAdresse($values['adresse']);
                $detenu->setTelephone($values['telephone']);
                $detenu->setInfraction($values['infraction']);
                $detenu->setCodePrison($values['codePrison']);
                //$detenu->setStatut($values['statut']);

                if($detenuDao->update($detenu)){
                    echo "<p>Modification effectuee avec Succes</p>";
                }else{
                    echo "Une erreur s'est produite";
                }
                exit();
            }
            break;
        }
        case "Transferer":{
            //------------Transferer
            $errors = [];
            $values = [];
            $detenu = new Detenu();
            $detenuDao = new DetenuDao();
            $prisonDao = new PrisonDAO();

            if (!isset($_POST['idDetenu']) || empty(trim($_POST['idDetenu']))) {
                
            } else {
                $values['idDetenu'] = htmlspecialchars(trim($_POST['idDetenu']));
            }

            // Vérification du champ 'codePrison'
            if(isset($_POST['codePrison'])){
                if (empty(trim($_POST['codePrison']))) {
                    $values['codePrison'] = null;
                } else {
                    if(preg_match('/^\d+$/', htmlspecialchars(trim($_POST['codePrison'])))){
                        $prison = $prisonDao->rechercherPrisons(htmlspecialchars(trim($_POST['codePrison'])));
                        
                        if($prison == null){
                            $errors['error_codePrison'] = "Une erreur s'est produite, Prison inexistant";
                        }else{
                            $totalDetenu = $detenuDao->nombreDetenu($prison->getCode());
                            if($totalDetenu < ($prison->getNombreCellules() * $prison->getNombrePlacesParCellule())){
                                $values['codePrison'] = htmlspecialchars(trim($_POST['codePrison']));
                            }else{
                                $errors['error_codePrison'] = "Une erreur s'est produite, La prison n'a plus de place";
                            }
                        }
                        $values['codePrison'] = htmlspecialchars(trim($_POST['codePrison']));
                    }else{
                        $errors['error_codePrison'] = "Une erreur s'est produite dans la recuperation de la code";
                    }
                }
            }else{
                $errors['error_codePrison'] = "Une erreur s'est produite dans la recuperation de la code";
            }

            if(!empty($errors)) {
                $query = http_build_query(array_merge($errors, $values));
                header("Location: ../views/detenu/transferer_detenu.php?$query");
                exit();
            } else {

                $detenu->setCode($values['idDetenu']);
                $detenu->setCodePrison($values['codePrison']);
                //$detenu->setStatut($values['statut']);

                if($detenuDao->transferer($detenu->getCode(), $detenu->getCodePrison())){
                    header("Location: ../views/detenu/afficher_detenu.php");
                }else{
                    echo "Une erreur s'est produite";
                }
                exit();
            }
            break;
        }
    }

}