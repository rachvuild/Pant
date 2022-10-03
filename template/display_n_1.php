<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
        <caption>Mon équipe</caption>
        <thead>
            <tr>
                <th>Mail</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Prendre rendez-vous</th>
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
                        <td><form method='post' action='affichage.php'>
                        <p>
                            <input type='text' name='id_user' id='id_user' value='".$ligne[3]."' hidden /><br/>               
                            <input type='submit' value='RDV' />
                            
                        </p>
                     </form></td>
                        </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>