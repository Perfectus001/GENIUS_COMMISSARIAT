<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher Contravention</title>
</head>
<body>
    <?php
        require_once(__DIR__ . '/../../dao/ContraventionDao.php');
        $contraventionDao = new ContraventionDao();

        if (isset($_GET['code'])) {
            $code= $_GET['code'];

            $contravention = $contraventionDao->search($code);

            if ($contravention == null) {
                echo "Contravention introuvable";
            } else {
                ?>
                <p>Nom Propriétaire: <?= $contravention->getNomProprio() ?> </p>
                <p>Numéro de Permis: <?= $contravention->getNoPermit() ?> </p>
                <p>Numéro de Plaque: <?= $contravention->getNoPlaque() ?> </p>
                <p>Lieu de la Contravention: <?= $contravention->getLieuContrav() ?> </p>
                <p>Numéro de Violation: <?= $contravention->getNoViolation() ?> </p>
                <p>Article: <?= $contravention->getArticle() ?> </p>
                <p>Date: <?= $contravention->getDate() ?> </p>
                <p>Heure: <?= $contravention->getHeure() ?> </p>
                <p>Numéro d'Agent: <?= $contravention->getNoAgent() ?> </p>
                <p>Numéro de Matricule: <?= $contravention->getNoMatricule() ?> </p>
                <?php 

                $contravArray = [
                    ''=>'',
                    'idContrav' => $contravention->getCode(),
                    'nomProprio'=> $contravention->getNomProprio(),
                    'noPermit'=> $contravention->getNoPermit(),
                    'noPlaque'=> $contravention->getNoPlaque(),
                    'lieuContrav'=> $contravention->getLieuContrav(),
                    'noViolation'=> $contravention->getNoViolation(),
                    'article'=> $contravention->getArticle(),
                    'date'=> $contravention->getDate(),
                    'heure'=> $contravention->getHeure(),
                    'noAgent'=> $contravention->getNoAgent(),
                    'noMatricule'=> $contravention->getNoMatricule(),
                ];

                $queryString = http_build_query(['contravention' => $contravArray]);
                ?>

                <br><br>
                <a href="modifier_contrav.php?contravention=<?= $queryString ?>">Modifier</a> || 
                <a href="../../controllers/contraventionController.php?choix=sup&noViolation=<?= $contravention->getNoViolation() ?>">Supprimer</a> || 
                <a href="modifier_contrav.php?contravention=<?= $queryString ?>">Transfert</a> || 
                <a href="../../controllers/contraventionController.php?choix=lib&noViolation=<?= $contravention->getNoViolation() ?>">Liberer</a> 
                <?php
            }
        }
    ?>
</body>
</html>
