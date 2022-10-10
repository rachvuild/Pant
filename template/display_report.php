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
        <caption>Compte rendu</caption>
        <thead>
            <tr>
                <th>date</th>
                <th>heure</th>
                <th>détail</th>
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
                        <td><form method='post' action='affichage.php'>
                        <p>
                            <input type='text' name='id_report' id='id_report' value='".$ligne[2]."' hidden /><br/>               
                            <input type='submit' value='détail' />
                            
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