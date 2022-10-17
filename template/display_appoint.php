<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Rendez-vous passez</h1>
<?php
    if ($past->execute())
    {
        foreach ($pdo->query($pastdate) AS $ligne)
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
                        <td>
                            <form method='post' action='sampleController.php'>
                            <p>
                                <input type='date' name='date_appoint' id='date_appoint' value='".$ligne[0]."' hidden /><br/>
                                <input type='time' name='hour_appoint' id='hour_appoint' value='".$ligne[1]."' hidden /><br/>
                                <input type='number' name='id_appoint' id='id_appoint' value='".$ligne[2]."' hidden /><br/>
                                <input type='text' name='id_user' id='id_user' value='".$ligne[3]."' hidden /><br/>
                                <input type='number' name='id_client' id='id_client' value='".$ligne[4]."' hidden /><br/>                
                                <input type='submit' value='compte rendu' />
                                
                            </p>
                            </form>
                    </tbody>
                </table>";}};
?>      
<h1>Rendez-vous à venir</h1>
<?php
    if ($futur->execute())
    {
        foreach ($pdo->query($futurdate) AS $ligne)
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
                        <td>
                            <form method='post' action='sampleController.php'>
                            <p>
                                <input type='number' name='id_client' id='id_client' value='".$ligne[2]."' hidden /><br/>                
                                <input type='submit' value='Info client' />
                                
                            </p>
                            </form>
                    </tbody>
                </table>";}};
?>      
</body>
</html>