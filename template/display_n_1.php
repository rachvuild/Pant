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
                        echo "<tr>";
                        for ($i=0;$i<=$req->columnCount()-1;$i++)
                        {
                            echo "<td>".$ligne[$i]."</td>";
                        }
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>