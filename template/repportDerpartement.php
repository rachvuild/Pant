<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assert/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container_n">
        <table class="table_cr">
            <h1>Tous les comptes rendus remplis :</h1>
            <thead>

                <th>Label client</th>
                <th>Nom client</th>
                <th>Commercial</th>
                <th>Compte rendu</th>
                <th>Appréciation</th>
                <th>Date déposeé</th>
                <th>Info client</th>
                <th>Commenter</th>
            </thead>

            <?php

            if ($_SESSION != null) {
                // var_dump($allrepport);
                // die;
                foreach ($allrepport as $ligne) {
                    echo
                    "
        <tbody>
                    <td>" . $ligne['label_client'] . "</td>
                    <td>" . $ligne['nom_client'] . "</td>
                    <td>" . $ligne['id_user'] . "</td>
                    <td>" . $ligne['summary_report'] . "</td>
                    <td>" . $ligne['interest_report'] . "</td>
                    <td>" . $ligne['date_repport'] . "</td>
                    <td><form method='post' action='controler_info_client.php'>
                        <p>
                            <input type='number' name='id_client' id='id_client' value='" . $ligne[5] . "' hidden /><br/>                
                            <input type='submit' value='Info client' />
                            
                        </p>
                        </form></td>
                        <td><form method='post' action='create_com_controller.php'>
                        <p> 
                            <input type='number' name='id_report' id='id_report' value='$ligne[6]' hidden /><br/>              
                            <input type='submit' name='Commenter' value='Commenter' />                           
                        </p>
                        </form>

                        </td>
                    </tbody>
                    ";
                }
            } else {
                header("location: connexion.php");
            }

            ?>
        </table>
    </div>
</body>

</html>