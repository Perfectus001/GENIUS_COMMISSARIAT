<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher detenu</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div>
            <label for="idDetenu">Id detenu</label>
            <input type="text" id="idDetenu" name="idDetenu" />
        </div>
        <div>
            <input type="submit" value="Recherche">
        </div>
    </form>
    <?php
    require_once(__DIR__ . '/../../dao/DetenuDao.php');
    $detenuDao = new DetenuDao();
    $detenus = $detenuDao->displayAll();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['idDetenu']) || empty(trim($_POST['idDetenu']))) {
    ?>
            <p style='color: red;'>Le champ est requis</p>

            <?php
        } else {
            $id = htmlspecialchars(trim($_POST['idDetenu']));
            $det = $detenuDao->search($id);
            if ($det == null) {
                if ((count($detenus) > 0) && $detenus != null) { ?>
                    <h1>Liste des Détenus</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>CIN/NIF</th>
                                <th>Sexe</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                                <th>Infraction</th>
                                <th>Prison</th>
                                <th>Date d'Arrestation</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($detenus as $detenu) {
                            $date = new DateTime($detenu->getDateArrestation());
                            $dateSimple = $date->format('d-m-Y');
                            echo "<tr>";
                            echo "<td>" . $detenu->getCode() . "</td>";
                            echo "<td>" . $detenu->getNom() . "</td>";
                            echo "<td>" . $detenu->getPrenom() . "</td>";
                            echo "<td>" . $detenu->getCin_nif() . "</td>";
                            echo "<td>" . $detenu->getSexe() . "</td>";
                            echo "<td>" . $detenu->getAdresse() . "</td>";
                            echo "<td>" . $detenu->getTelephone() . "</td>";
                            echo "<td>" . $detenu->getInfraction() . "</td>";
                            if ($detenu->getCodePrison() == null) {
                                echo "<td>" . "Commissariat" . "</td>";
                            } else {
                                echo "<td>" . $detenu->getCodePrison() . "</td>";
                            }
                            echo "<td>" . $dateSimple . "</td>";
                            echo "<td>" . $detenu->getStatut() . "</td>";
                            echo "<td><a href=rechercher_detenu.php?code=" . htmlspecialchars($detenu->getCode()) . ">Plus</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<p>Aucun detenu n'est enregistrer</p>";
                    }
                        ?>
                        </tbody>
                    </table>
                <?php
            } else {
                if($det->getCode() != null){
                ?>
                    <h1>Liste des Détenus</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>CIN/NIF</th>
                                <th>Sexe</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                                <th>Infraction</th>
                                <th>Prison</th>
                                <th>Date d'Arrestation</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $date = new DateTime($det->getDateArrestation());
                            $dateSimple = $date->format('d-m-Y');
                            echo "<tr>";
                            echo "<td>" . $det->getCode() . "</td>";
                            echo "<td>" . $det->getNom() . "</td>";
                            echo "<td>" . $det->getPrenom() . "</td>";
                            echo "<td>" . $det->getCin_nif() . "</td>";
                            echo "<td>" . $det->getSexe() . "</td>";
                            echo "<td>" . $det->getAdresse() . "</td>";
                            echo "<td>" . $det->getTelephone() . "</td>";
                            echo "<td>" . $det->getInfraction() . "</td>";
                            if ($det->getCodePrison() == null) {
                                echo "<td>" . "Commissariat" . "</td>";
                            } else {
                                echo "<td>" . $det->getCodePrison() . "</td>";
                            }
                            echo "<td>" . $dateSimple . "</td>";
                            echo "<td>" . $det->getStatut() . "</td>";
                            echo "<td><a href=rechercher_detenu.php?code=" . htmlspecialchars($det->getCode()) . ">Plus</a></td>";
                            echo "</tr>";
                            ?>
                        </tbody>
                    </table>
            <?php
            }else{
                echo "<p style='color: red;'>Numero de detenu introuvable</p>";
            }
        }
        }
    } else {
            ?>
            <?php
            if ((count($detenus) > 0) && $detenus != null) { ?>
                <h1>Liste des Détenus</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>CIN/NIF</th>
                            <th>Sexe</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Infraction</th>
                            <th>Prison</th>
                            <th>Date d'Arrestation</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($detenus as $detenu) {
                            $date = new DateTime($detenu->getDateArrestation());
                            $dateSimple = $date->format('d-m-Y');
                            echo "<tr>";
                            echo "<td>" . $detenu->getCode() . "</td>";
                            echo "<td>" . $detenu->getNom() . "</td>";
                            echo "<td>" . $detenu->getPrenom() . "</td>";
                            echo "<td>" . $detenu->getCin_nif() . "</td>";
                            echo "<td>" . $detenu->getSexe() . "</td>";
                            echo "<td>" . $detenu->getAdresse() . "</td>";
                            echo "<td>" . $detenu->getTelephone() . "</td>";
                            echo "<td>" . $detenu->getInfraction() . "</td>";
                            if ($detenu->getCodePrison() == null) {
                                echo "<td>" . "Commissariat" . "</td>";
                            } else {
                                echo "<td>" . $detenu->getCodePrison() . "</td>";
                            }
                            echo "<td>" . $dateSimple . "</td>";
                            echo "<td>" . $detenu->getStatut() . "</td>";
                            echo "<td><a href=rechercher_detenu.php?code=" . htmlspecialchars($detenu->getCode()) . ">Plus</a></td>";
                            echo "</tr>";
                        }
                    } else { ?>
                        <p>Aucun detenu n'est enregistrer</p>;
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            <?php } ?>
</body>

</html>