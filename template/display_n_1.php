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
<div class="container_n">
<table class="table_cr">
        <caption>Mon équipe</caption>
        <thead>
            <tr>
                <th>Mail</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Prendre rendez-vous</th>
                <th>Compte rendu</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($req->execute())
                {
                    foreach ($pdo->query($request) AS $ligne)
                    {
                        echo "<tr>
                        <td>".$ligne[0]."</td>
                        <td>".$ligne[1]."</td>
                        <td>".$ligne[2]."</td>
                        <td><form method='post' action='takeAppoint.php'>
                        <p>
                            <input type='text' name='id_user' id='id_user' value='".$ligne[3]."' hidden /><br/>               
                            <input type='submit' value='RDV' name='rdv' />
                            
                        </p>
                        </form></td>
                        <td><form method='post' action='report_controller.php'>
                        <p>
                            <input type='text' name='id_user' id='id_user' value='".$ligne[3]."' hidden /><br/>               
                            <input type='submit' value='compte rendu' name='compte_rendu' />
                            
                        </p>
                        </form></td>
                        </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>