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
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th>
                    <th>Code postal</th>
                    <th>Ville</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Label</th>
                    <th>Commentaire</th>
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
                    <th>Interêt</th>
                    <th>L'émetteur</th>
                    <th>Date</th>
                    <!-- <th>voir plus</th> -->
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
                        
                    </tbody>
                    ";
                // <td>
                //     <form action='' method='POST'>
                //     <input type='text' name='.$ligne[4].' hidden>
                //     <input type='text' name='.$ligne[5].' hidden>
                //     <input type='submit'  value='Info repport'>
                //     </form>
                //     </td>
                // var_dump($ligne[4], $ligne[5]);
            }
            if ($_SESSION == null) {
                header("location: connexion.php");
            }
            ?>
        </table>
    </div>
</body>