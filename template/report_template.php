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
    <div class="container_cr">
    <h1>Compte rendu Modifiable</h1>
    <table class='table_cr'>
        <thead>
            <tr>
                <th>Rapport</th>
                <th>Interet</th>
                <th>Date</th>
                <th>Info client</th>
                <th>Modifier</th>
            </tr>
        </thead>
<?php
        foreach ($inforeportno AS $ligne)
        {
            echo "
                    <tbody>
                        <td>".$ligne[0]."</td>
                        <td>".$ligne[1]."</td>
                        <td>".$ligne[2]."</td>
                        <td><form method='post' action='controler_info_client.php'>
                        <p>
                            <input type='number' name='id_client' id='id_client' value='" . $ligne[3] . "' hidden /><br/>                
                            <input type='submit' value='Info client' />
                            
                        </p>
                        </form></td>";
                if($id_job==1){
                    echo "<td><form method='post' action='update_report_controller.php'>
                        <p> 
                            <input type='number' name='id_report' id='id_report' value='$ligne[4]' hidden /><br/>              
                            <input type='submit' value='Modifier' />                           
                        </p>
                        </form>

                        </td>
                    </tbody>
                    ";
                }
                else{
                    echo "<td><form method='post' action='create_com_controller.php'>
                        <p> 
                            <input type='number' name='id_report' id='id_report' value='$ligne[4]' hidden /><br/>              
                            <input type='submit' value='Commenter' name='Commenter' />                           
                        </p>
                        </form>

                        </td>
                    </tbody>";
            }}
?>
</table>
<h1>Compte rendu final</h1>
<table class='table_cr'>
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
<?php
foreach($inforeport AS $ligne){
    echo "
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
                    </tbody>";}
?>
    </table>
    </div>
</body>   