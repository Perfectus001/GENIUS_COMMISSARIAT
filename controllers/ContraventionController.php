<?php
require_once(__DIR__ . '/../dao/Contraventiondao.php');
$daoContrav = new ContraventionDAO();
if (isset($_GET['code'])) {
    // Récupérer la valeur de 'code' depuis l'URL
    $code = $_GET['code'];
    $action = $_GET['choix'];

    switch($action){
        case 'sup':{
            if($daoContrav->delete($code)){
                echo "Suppression effectuee avec succes";
                header("Location: ../views/Contravention/afficher_contrav.php");
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
    $errors = [];
    $values = [];
    switch ($submit) {
        case "Enregistrer": {
                // Vérification du champ 'nomProprio'
                if (!isset($_POST['nomProprio']) || empty(trim($_POST['nomProprio']))) {
                    $errors['error_nomProprio'] = "Le champ Nom Propriétaire est requis.";
                } else {
                    $values['nomProprio'] = htmlspecialchars(trim($_POST['nomProprio']));
                }

                // Vérification du champ 'noPermit'
                if (!isset($_POST['noPermit']) || empty(trim($_POST['noPermit']))) {
                    $errors['error_noPermit'] = "Le champ No. Permis est requis.";
                } else {
                    $values['noPermit'] = htmlspecialchars(trim($_POST['noPermit']));
                }

                // Vérification du champ 'noPlaque'
                if (!isset($_POST['noPlaque']) || empty(trim($_POST['noPlaque']))) {
                    $errors['error_noPlaque'] = "Le champ No. Plaque est requis.";
                } else {
                    $values['noPlaque'] = htmlspecialchars(trim($_POST['noPlaque']));
                }

                // Vérification du champ 'lieuContrav'
                if (!isset($_POST['lieuContrav']) || empty(trim($_POST['lieuContrav']))) {
                    $errors['error_lieuContrav'] = "Le champ Lieu de contravention est requis.";
                } else {
                    $values['lieuContrav'] = htmlspecialchars(trim($_POST['lieuContrav']));
                }

                // Vérification du champ 'noViolation'
                if (!isset($_POST['noViolation']) || empty(trim($_POST['noViolation']))) {
                    $errors['error_noViolation'] = "Le champ No. Violation est requis.";
                } else {
                    $values['noViolation'] = htmlspecialchars(trim($_POST['noViolation']));
                }

                // Vérification du champ 'article'
                if (!isset($_POST['article']) || empty(trim($_POST['article']))) {
                    $errors['error_article'] = "Le champ Article est requis.";
                } else {
                    $values['article'] = htmlspecialchars(trim($_POST['article']));
                }

                // Vérification du champ 'date'
                if (!isset($_POST['date']) || empty(trim($_POST['date']))) {
                    $errors['error_date'] = "Le champ Date est requis.";
                } else {
                    $values['date'] = htmlspecialchars(trim($_POST['date']));
                }

                // Vérification du champ 'heure'
                if (!isset($_POST['heure']) || empty(trim($_POST['heure']))) {
                    $errors['error_heure'] = "Le champ Heure est requis.";
                } else {
                    $values['heure'] = htmlspecialchars(trim($_POST['heure']));
                }

                // Vérification du champ 'noAgent'
                if (!isset($_POST['noAgent']) || empty(trim($_POST['noAgent']))) {
                    $errors['error_noAgent'] = "Le champ No. Agent est requis.";
                } else {
                    $values['noAgent'] = htmlspecialchars(trim($_POST['noAgent']));
                }

                // Vérification du champ 'noMatricule'
                if (!isset($_POST['noMatricule']) || empty(trim($_POST['noMatricule']))) {
                    $errors['error_noMatricule'] = "Le champ No. Matricule est requis.";
                } else {
                    $values['noMatricule'] = htmlspecialchars(trim($_POST['noMatricule']));
                }

                if (!empty($errors)) {
                    $query = http_build_query(array_merge($errors, $values));
                    header("Location: ../views/Contravention/enregistrer_contrav.php?$query");
                    exit();
                } else {
                    $contravention = new Contravention();
                    $contravention->setNomProprio($values['nomProprio']);
                    $contravention->setNoPermit($values['noPermit']);
                    $contravention->setNoPlaque($values['noPlaque']);
                    $contravention->setLieuContrav($values['lieuContrav']);
                    $contravention->setNoViolation($values['noViolation']);
                    $contravention->setArticle($values['article']);
                    $contravention->setDate($values['date']);
                    $contravention->setHeure($values['heure']);
                    $contravention->setNoAgent($values['noAgent']);
                    $contravention->setNoMatricule($values['noMatricule']);

                    if ($daoContrav->save($contravention)) {
                        echo "Succes de l'enregistrement";
                    }
                    exit();
                }
            break;
        }
        case "Modifier":{

                if (!isset($_POST['idContrav']) || empty(trim($_POST['idContrav']))) {
                    
                } else {
                    $values['idContrav'] = htmlspecialchars(trim($_POST['idContrav']));
                }
                
                // Vérification du champ 'nomProprio'
                if (!isset($_POST['nomProprio']) || empty(trim($_POST['nomProprio']))) {
                    $errors['error_nomProprio'] = "Le champ Nom Propriétaire est requis.";
                } else {
                    $values['nomProprio'] = htmlspecialchars(trim($_POST['nomProprio']));
                }

                // Vérification du champ 'noPermit'
                if (!isset($_POST['noPermit']) || empty(trim($_POST['noPermit']))) {
                    $errors['error_noPermit'] = "Le champ No. Permis est requis.";
                } else {
                    $values['noPermit'] = htmlspecialchars(trim($_POST['noPermit']));
                }

                // Vérification du champ 'noPlaque'
                if (!isset($_POST['noPlaque']) || empty(trim($_POST['noPlaque']))) {
                    $errors['error_noPlaque'] = "Le champ No. Plaque est requis.";
                } else {
                    $values['noPlaque'] = htmlspecialchars(trim($_POST['noPlaque']));
                }

                // Vérification du champ 'lieuContrav'
                if (!isset($_POST['lieuContrav']) || empty(trim($_POST['lieuContrav']))) {
                    $errors['error_lieuContrav'] = "Le champ Lieu de contravention est requis.";
                } else {
                    $values['lieuContrav'] = htmlspecialchars(trim($_POST['lieuContrav']));
                }

                // Vérification du champ 'noViolation'
                if (!isset($_POST['noViolation']) || empty(trim($_POST['noViolation']))) {
                    $errors['error_noViolation'] = "Le champ No. Violation est requis.";
                } else {
                    $values['noViolation'] = htmlspecialchars(trim($_POST['noViolation']));
                }

                // Vérification du champ 'article'
                if (!isset($_POST['article']) || empty(trim($_POST['article']))) {
                    $errors['error_article'] = "Le champ Article est requis.";
                } else {
                    $values['article'] = htmlspecialchars(trim($_POST['article']));
                }

                // Vérification du champ 'date'
                if (!isset($_POST['date']) || empty(trim($_POST['date']))) {
                    $errors['error_date'] = "Le champ Date est requis.";
                } else {
                    $values['date'] = htmlspecialchars(trim($_POST['date']));
                }

                // Vérification du champ 'heure'
                if (!isset($_POST['heure']) || empty(trim($_POST['heure']))) {
                    $errors['error_heure'] = "Le champ Heure est requis.";
                } else {
                    $values['heure'] = htmlspecialchars(trim($_POST['heure']));
                }

                // Vérification du champ 'noAgent'
                if (!isset($_POST['noAgent']) || empty(trim($_POST['noAgent']))) {
                    $errors['error_noAgent'] = "Le champ No. Agent est requis.";
                } else {
                    $values['noAgent'] = htmlspecialchars(trim($_POST['noAgent']));
                }

                // Vérification du champ 'noMatricule'
                if (!isset($_POST['noMatricule']) || empty(trim($_POST['noMatricule']))) {
                    $errors['error_noMatricule'] = "Le champ No. Matricule est requis.";
                } else {
                    $values['noMatricule'] = htmlspecialchars(trim($_POST['noMatricule']));
                }

                if (!empty($errors)) {
                    $query = http_build_query(array_merge($errors, $values));
                    header("Location: ../views/Contravention/modifier_contrav.php?$query");
                    exit();
                } else {
                    $contravention = new Contravention();
                    $contravention->setcode($values['idContrav']);
                    $contravention->setNomProprio($values['nomProprio']);
                    $contravention->setNoPermit($values['noPermit']);
                    $contravention->setNoPlaque($values['noPlaque']);
                    $contravention->setLieuContrav($values['lieuContrav']);
                    $contravention->setNoViolation($values['noViolation']);
                    $contravention->setArticle($values['article']);
                    $contravention->setDate($values['date']);
                    $contravention->setHeure($values['heure']);
                    $contravention->setNoAgent($values['noAgent']);
                    $contravention->setNoMatricule($values['noMatricule']);

                    if ($daoContrav->update($contravention)) {
                        echo "Succes de la modification";
                    }
                    exit();
                }
            break;
            break;
        }
            
    }
}
