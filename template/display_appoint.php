<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if ($req->execute())
    {
        foreach ($pdo->query($request) AS $ligne)
        {
            echo "
                <table>
                    <thead>
                        <tr>
                            <th>".$ligne[0]."</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>".$ligne[1]."</td>
                    </tbody>
                </table>";}}
?>      
</body>
</html>