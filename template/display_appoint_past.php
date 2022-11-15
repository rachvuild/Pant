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
    if ($past->execute()) {
        foreach ($pdo->query($pastdate) as $ligne) {
            echo "
            <table class='appoint_past'>
            <thead>
            <tr>
            <th>" . $ligne[0] . "</th>
            </tr>
            </thead>";
            $pastd = Dayspast($ligne[0], $id_user, $pdo);
            echo "<tbody>";
            foreach ($pastd as $ligne) {
                // var_dump($ligne);
                echo "<tr>
                   <tr> <td>heure : " . $ligne[1] . "</td></tr>
                   <tr> <td>label : " . $ligne[5] . "</td></tr>
                   <tr> <td>Nom : " . $ligne["nom_client"] . "</td></tr>
                   <tr> <td>Prenom : " . $ligne["prenom_client"] . "</td></tr>
                    <td><form method='post' action='sampleController.php'>
                    <p>
                        <input type='number' name='id_appoint' id='id_appoint' value='" . $ligne[2] . "' hidden />
                        <input type='text' name='id_user' id='id_user' value='" . $ligne[3] . "' hidden />
                        <input type='number' name='id_client' id='id_client' value='" . $ligne[4] . "' hidden />                
                        <input type='submit' value='rédiger compte rendu' />
                    
                    </p>
                    </form></td> 
                    </tr>  
                    ";
            };
            echo "</tbody>
            </table>";
        }
    }
    ?>
</body>

</html>