<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                            <form method='post' action='controler_info_client.php'>
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