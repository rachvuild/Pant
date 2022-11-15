<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Compte rendu Modifiable</h1>
<?php
        foreach ($inforeportno AS $ligne)
        {
            echo "
                <table>
                    <thead>
                    <tr>
                    <th>Rapport</th>
                    <th>Interet</th>
                    <th>Date</th>
                    <th>Info client</th>
                    <th>Modifier</th>
                </tr>
                    </thead>
                    <tbody>
                        <td>".$ligne[0]."</td>
                        <td>".$ligne[1]."</td>
                        <td>".$ligne[2]."</td>
                        <td><form method='post' action='controler_info_client.php'>
                        <p>
                            <input type='number' name='id_client' id='id_client' value='" . $ligne[3] . "' hidden /><br/>                
                            <input type='submit' value='Info client' />
                            
                        </p>
                        </form></td>
                        <td><form method='post' action='controler_info_client.php'>
                        <p>                
                            <input type='submit' value='Modifier' />                           
                        </p>
                        </form>

                        </td>
                    </tbody>
                </table>";}
?> 
<h1>Compte rendu final</h1>
<?php
foreach($inforeport AS $ligne){
    echo "
                <table>
                    <thead>
                        <tr>
                            <th>Rapport</th>
                            <th>Interet</th>
                            <th>Commentaire</th>
                            <th>L'emetteur</th>
                            <th>Date</th>
                            <th>Info client</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>".$ligne[0]."</td>
                        <td>".$ligne[1]."</td>
                        <td>".$ligne[2]."</td>
                        <td>".$ligne[3]."</td>
                        <td>".$ligne[4]."</td>
                        <td><form method='post' action='controler_info_client.php'>
                        <p>
                            <input type='number' name='id_client' id='id_client' value='" . $ligne[5] . "' hidden /><br/>                
                            <input type='submit' value='Info client' />
                            
                        </p>
                        </form></td>
                    </tbody>
                </table>";}
?>
</body>   