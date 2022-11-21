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
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Mail</th>
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
                        <td>".$ligne[7]."</td>
                        <td>".$ligne[8]."</td>
                        <td>".$ligne[9]."</td>
                        <td>".$ligne[1]."</td>
                        <td>".$ligne[2]."</td>
                        <td>".$ligne[3]."</td>
                        <td>".$ligne[4]."</td>
                        <td>".$ligne[5]."</td>
                        <td>".$ligne[6]."</td>
                    </tbody>
                </table>";}}
?> 
<h1>Compte rendu existant sur votre client</h1>
<?php
foreach($reportclient AS $ligne){
    echo "
                <table>
                    <thead>
                        <tr>
                            <th>Rapport</th>
                            <th>Interet</th>
                            <th>L'emetteur</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>".$ligne[0]."</td>
                        <td>".$ligne[1]."</td>
                        <td>".$ligne[2]."</td>
                        <td>".$ligne[3]."</td>
                    </tbody>
                </table>";}
?>
</body>   