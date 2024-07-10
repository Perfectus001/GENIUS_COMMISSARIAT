<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once(__DIR__ . '/../../dao/DetenuDao.php');
        $detenuDao = new DetenuDao();

        if (isset($_GET['code'])) {
            $code = $_GET['code'];

            $detenu = $detenuDao->search($code);

            if($detenu == null){
                echo "Detenu introuvable";
            }else{
                ?>
                <p>NOM: <?= $detenu->getNom() ?> </p>
                <p>PRENOM: <?= $detenu->getPreNom() ?> </p>
                <p>CIN|NIF: <?= $detenu->getCin_nif() ?> </p>
                <p>SEXE: <?= $detenu->getSexe() ?> </p>
                <p>ADRESSE: <?= $detenu->getAdresse() ?> </p>
                <p>TELEPHONE: <?= $detenu->getTelephone() ?> </p>
                <p>INFRACTION: <?= $detenu->getInfraction() ?> </p>
                <p>STATUT: <?= $detenu->getStatut() ?> </p>
                <?php 

                if ($detenu->getCodePrison() == null) {
                ?>
                    <p>PRISON: Commissariat</p>
                <?php
                } else {
                ?>
                    <p>PRISON: <?= $detenu->getCodePrison()  ?> </p>
                <?php
                }
                $date = new DateTime($detenu->getDateArrestation());
                $dateSimple = $date->format('d-m-Y');

                $detArray = [
                    ''=>'',
                    'idDetenu' => $detenu->getCode(),
                    'nom'=> $detenu->getNom(),
                    'prenom'=> $detenu->getprenom(),
                    'cin_nif'=> $detenu->getCin_nif(),
                    'sexe'=> $detenu->getSexe(),
                    'adresse'=> $detenu->getAdresse(),
                    'telephone'=> $detenu->getTelephone(),
                    'infraction'=> $detenu->getInfraction(),
                    'statut'=> $detenu->getStatut(),
                    'codePrison'=> $detenu->getCodePrison(),
                    'dateArrestation'=> $detenu->getDateArrestation(),
                    'etat'=> $detenu->getEtat(),
                ];

                $queryString = http_build_query(['detenu' => $detArray]);
                ?>
                    <p>DATE ARRESTATION: <?= $dateSimple ?></p>

                    <br><br>
                    <a href="modifier_detenu.php?detenu<?= $queryString ?>">Modifier</a> || 
                    <a href="../../controllers/detenuController.php?choix=sup&code=<?= $detenu->getCode() ?>">Supprimer</a> || 
                    <a href="transferer_detenu.php?detenu=<?= $queryString ?>">Transfert</a> || 
                    <a href="../../controllers/detenuController.php?&choix=lib&code=<?= $detenu->getCode() ?>">Liberer</a> 
                <?php
            }
        }
    ?>
</body>
</html>

