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
    if ($futur->execute()) {
        foreach ($pdo->query($futurdate) as $ligne) {
            echo "
                <table class='appoint_futur'>
                    <thead>
                        <tr>
                            <th>" . $ligne[0] . "</th>
                        </tr>
                    </thead><tbody>";
            $futurd = Days($ligne[0], $id_user, $pdo);

            foreach ($futurd as $ligne) {

                echo "
                <tr> <td>heure : " . $ligne[0] . "</td></tr>
                <tr> <td>label : " . $ligne[2] . "</td></tr>
                <tr> <td>Nom : " . $ligne["nom_client"] . "</td></tr>
                <tr> <td>Prenom : " . $ligne["prenom_client"] . "</td></tr>
                       

                        <td>
                            <form method='post' action='controler_info_client.php'>
                            <p>
                                <input type='number' name='id_client' id='id_client' value='" . $ligne[1] . "' hidden />               
                                <input type='submit' value='Info client' />
                                
                            </p>
                            </form>
                    ";
            };
            echo "</tbody>
            </table>";
        }
    }

    ?>
</body>

</html>