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
                <th>Numéro département</th>
                <th>nom département</th>
                <th>mail</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Compte rendu</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($reqd->execute())
                {
                    foreach ($pdo->query($requestd) AS $ligne)
                    {
                        echo "<tr>
                        <td>".$ligne[0]."</td>
                        <td>".$ligne[1]."</td>
                        <td>".$ligne[2]."</td>
                        <td>".$ligne[3]."</td>
                        <td>".$ligne[4]."</td>
                        <td><form method='post' action='affichage.php'>
                        <p>
                            <input type='text' name='id_user' id='id_user' value='".$ligne[5]."' hidden /><br/>               
                            <input type='submit' value='Compte rendu' />
                            
                        </p>
                        </form></td>
                        </tr>";
                    }
                    $reqd->closeCursor();
                }
            ?>
        </tbody>
    </table>
</body>
</html>