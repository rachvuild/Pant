<!DOCTYPE html>
<html lang="en">


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

            foreach ($pastd as $ligne) {
                // var_dump($ligne);
                echo "
                <tbody class='card_futur'><tr>
                   <tr> <td>heure : " . $ligne[1] . "</td></tr>
                   <tr> <td>label : " . $ligne[5] . "</td></tr>
                   <tr> <td>Nom : " . $ligne["nom_client"] . "</td></tr>
                   <tr> <td>Prenom : " . $ligne["prenom_client"] . "</td></tr>
                    <td><form method='post' action='sampleController.php'>
                    <p>
                        <input type='number' name='id_appoint' id='id_appoint' value='" . $ligne[2] . "' hidden />
                        <input type='text' name='id_user' id='id_user' value='" . $ligne[3] . "' hidden />
                        <input type='number' name='id_client' id='id_client' value='" . $ligne[4] . "' hidden />
                        <input type='text' name='label_client' id='label_client' value='" . $ligne[5] . "' hidden />                

                        <input type='submit' value='rédiger compte rendu' name='cr' />
                    
                    </p>
                    </form></td> 
                    </tr>  
                    </tbody>
                    ";
            };
            echo "
            </table>";
        }
    }
    ?>
</body>

</html>