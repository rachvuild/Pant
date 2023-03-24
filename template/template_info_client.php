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
        <div class="table_info_cl">
            <table class='table_cr'>
                <thead>
                    <tr>
                        <th>Identifiant</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo "
                        <td>" . $client_info['id_client'] . "</td>";
                    ?>
                </tbody>
            </table>
            <table class='table_cr'>
                <thead>
                    <tr>
                        <th>Nom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo "
                        <td>" . $client_info['nom_client'] . "</td>";
                    ?>
                </tbody>
            </table>
            <table class='table_cr'>
                <thead>
                    <tr>
                        <th>Prénom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo "
                        <td>" . $client_info['prenom_client'] . "</td>";
                    ?>
                </tbody>
            </table>
            <table class='table_cr'>
                <thead>
                    <tr>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo "
                        <td>" . $client_info['email_client'] . "</td>";
                    ?>
                </tbody>
            </table>
            <table class='table_cr'>
                <thead>
                    <tr>
                        <th>Code postal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo "
                        <td>" . $client_info['pc_client'] . "</td>";
                    ?>
                </tbody>
            </table>
            <table class='table_cr'>
                <thead>
                    <tr>
                        <th>Ville</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo "
                        <td>" . $client_info['city_client'] . "</td>";
                    ?>
                </tbody>
            </table>
            <table class='table_cr'>
                <thead>
                    <tr>
                        <th>Adresse</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo "
                        <td>" . $client_info['address_client'] . "</td>";
                    ?>
                </tbody>
            </table>
            <table class='table_cr'>
                <thead>
                    <tr>
                        <th>Téléphone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo "
                        <td>" . $client_info['phone_client'] . "</td>";
                    ?>
                </tbody>
            </table>
            <table class='table_cr'>
                <thead>
                    <tr>
                        <th>Label</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo "
                        <td>" . $client_info['label_client'] . "</td>";
                    ?>
                </tbody>
            </table>
        </div>

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