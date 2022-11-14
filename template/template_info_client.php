<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Votre Client</h1>
<?php
    if ($infoc->execute())
    {
        foreach ($pdo->query($infoclient) AS $ligne)
        {
            echo "
                <table>
                    <thead>
                        <tr>
                            <th>identifiant</th>
                            <th>code postal</th>
                            <th>ville</th>
                            <th>adresse</th>
                            <th>téléphone</th>
                            <th>label</th>
                            <th>commentaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>".$ligne[0]."</td>
                        <td>".$ligne[1]."</td>
                        <td>".$ligne[2]."</td>
                        <td>".$ligne[3]."</td>
                        <td>".$ligne[4]."</td>
                        <td>".$ligne[5]."</td>
                        <td>".$ligne[6]."</td>
                    </tbody>
                </table>";}}
?> 
</body>   