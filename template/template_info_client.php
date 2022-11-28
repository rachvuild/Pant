<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assert/style.css">
    <title>GSB</title>
</head>

<body>
    <div class="container_cr">
        <h1>Votre Client</h1>
        <table class='table_cr'>
            <thead>
                <tr>
                    <th>identifiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th>
                    <th>code postal</th>
                    <th>ville</th>
                    <th>adresse</th>
                    <th>téléphone</th>
                    <th>label</th>
                    <th>commentaire</th>
                </tr>
            </thead>
            <?php
            if ($infoc->execute()) {
                foreach ($pdo->query($infoclient) as $ligne) {
                    echo "
                    <tbody>
                        <td>" . $ligne[0] . "</td>
                        <td>" . $ligne[7] . "</td>
                        <td>" . $ligne[8] . "</td>
                        <td>" . $ligne[9] . "</td>
                        <td>" . $ligne[1] . "</td>
                        <td>" . $ligne[2] . "</td>
                        <td>" . $ligne[3] . "</td>
                        <td>" . $ligne[4] . "</td>
                        <td>" . $ligne[5] . "</td>
                        <td>" . $ligne[6] . "</td>
                    </tbody>";
                }
            }
            ?>
        </table>
        <h1>Compte rendu existant sur votre client</h1>
        <table class='table_cr'>
            <thead>
                <tr>
                    <th>Rapport</th>
                    <th>Interet</th>
                    <th>L'emetteur</th>
                    <th>Date</th>
                </tr>
            </thead>
            <?php
            foreach ($reportclient as $ligne) {
                echo "
                    <tbody>
                        <td>" . $ligne[0] . "</td>
                        <td>" . $ligne[1] . "</td>
                        <td>" . $ligne[2] . "</td>
                        <td>" . $ligne[3] . "</td>
                    </tbody>";
            }
            if ($_SESSION == null) {
                header("location: index.php");
            }
            ?>
        </table>
    </div>
</body>