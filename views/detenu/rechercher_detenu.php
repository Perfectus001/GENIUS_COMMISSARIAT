<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Contravention</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div>
            <label for="noViolation">Numéro de Violation</label>
            <input type="text" id="noViolation" name="noViolation" />
        </div>
        <div>
            <input type="submit" value="Recherche">
        </div>
    </form>
    <?php
    require_once(__DIR__ . '/../../dao/ContraventionDao.php');
    $contraventionDao = new ContraventionDao();
    $contraventions = $contraventionDao->displayAll();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['noViolation']) || empty(trim($_POST['noViolation']))) {
    ?>
            <p style='color: red;'>Le champ est requis</p>

            <?php
        } else {
            $noViolation = htmlspecialchars(trim($_POST['noViolation']));
            $contrav = $contraventionDao->search($noViolation);
            if ($contrav == null) {
                if ((count($contraventions) > 0) && $contraventions != null) { ?>
                    <h1>Liste des Contraventions</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Numéro de Violation</th>
                                <th>Nom Propriétaire</th>
                                <th>Numéro de Permis</th>
                                <th>Numéro de Plaque</th>
                                <th>Lieu de la Contravention</th>
                                <th>Article</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Numéro d'Agent</th>
                                <th>Numéro de Matricule</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($contraventions as $contravention) {
                            $date = new DateTime($contravention->getDate());
                            $dateSimple = $date->format('d-m-Y');
                            echo "<tr>";
                            echo "<td>" . $contravention->getNoViolation() . "</td>";
                            echo "<td>" . $contravention->getNomProprio() . "</td>";
                            echo "<td>" . $contravention->getNoPermit() . "</td>";
                            echo "<td>" . $contravention->getNoPlaque() . "</td>";
                            echo "<td>" . $contravention->getLieuContrav() . "</td>";
                            echo "<td>" . $contravention->getArticle() . "</td>";
                            echo "<td>" . $dateSimple . "</td>";
                            echo "<td>" . $contravention->getHeure() . "</td>";
                            echo "<td>" . $contravention->getNoAgent() . "</td>";
                            echo "<td>" . $contravention->getNoMatricule() . "</td>";
                            echo "<td><a href=rechercher_contrav.php?noViolation=" . htmlspecialchars($contravention->getNoViolation()) . ">Plus</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<p>Aucune contravention n'est enregistrée</p>";
                    }
                        ?>
                        </tbody>
                    </table>
                <?php
            } else {
                if($contrav->getNoViolation() != null){
                ?>
                    <h1>Détails de la Contravention</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Numéro de Violation</th>
                                <th>Nom Propriétaire</th>
                                <th>Numéro de Permis</th>
                                <th>Numéro de Plaque</th>
                                <th>Lieu de la Contravention</th>
                                <th>Article</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Numéro d'Agent</th>
                                <th>Numéro de Matricule</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $date = new DateTime($contrav->getDate());
                            $dateSimple = $date->format('d-m-Y');
                            echo "<tr>";
                            echo "<td>" . $contrav->getNoViolation() . "</td>";
                            echo "<td>" . $contrav->getNomProprio() . "</td>";
                            echo "<td>" . $contrav->getNoPermit() . "</td>";
                            echo "<td>" . $contrav->getNoPlaque() . "</td>";
                            echo "<td>" . $contrav->getLieuContrav() . "</td>";
                            echo "<td>" . $contrav->getArticle() . "</td>";
                            echo "<td>" . $dateSimple . "</td>";
                            echo "<td>" . $contrav->getHeure() . "</td>";
                            echo "<td>" . $contrav->getNoAgent() . "</td>";
                            echo "<td>" . $contrav->getNoMatricule() . "</td>";
                            echo "<td><a href=rechercher_contrav.php?noViolation=" . htmlspecialchars($contrav->getNoViolation()) . ">Plus</a></td>";
                            echo "</tr>";
                            ?>
                        </tbody>
                    </table>
            <?php
            }else{
                echo "<p style='color: red;'>Numéro de contravention introuvable</p>";
            }
        }
        }
    } else {
            ?>
            <?php
            if ((count($contraventions) > 0) && $contraventions != null) { ?>
                <h1>Liste des Contraventions</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Numéro de Violation</th>
                            <th>Nom Propriétaire</th>
                            <th>Numéro de Permis</th>
                            <th>Numéro de Plaque</th>
                            <th>Lieu de la Contravention</th>
                            <th>Article</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Numéro d'Agent</th>
                            <th>Numéro de Matricule</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($contraventions as $contravention) {
                            $date = new DateTime($contravention->getDate());
                            $dateSimple = $date->format('d-m-Y');
                            echo "<tr>";
                            echo "<td>" . $contravention->getNoViolation() . "</td>";
                            echo "<td>" . $contravention->getNomProprio() . "</td>";
                            echo "<td>" . $contravention->getNoPermit() . "</td>";
                            echo "<td>" . $contravention->getNoPlaque() . "</td>";
                            echo "<td>" . $contravention->getLieuContrav() . "</td>";
                            echo "<td>" . $contravention->getArticle() . "</td>";
                            echo "<td>" . $dateSimple . "</td>";
                            echo "<td>" . $contravention->getHeure() . "</td>";
                            echo "<td>" . $contravention->getNoAgent() . "</td>";
                            echo "<td>" . $contravention->getNoMatricule() . "</td>";
                            echo "<td><a href=rechercher_contrav.php?noViolation=" . htmlspecialchars($contravention->getNoViolation()) . ">Plus</a></td>";
                            echo "</tr>";
                        }
                    } else { ?>
                        <p>Aucune contravention n'est enregistrée</p>;
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            <?php } ?>
</body>

</html>
