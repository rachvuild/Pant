<!DOCTYPE html>
<html lang="en">

<body>
    <div class="body_futur">

        <h1>Rendez-vous à venir</h1>
        <?php
        if ($futur->execute()) {
            foreach ($pdo->query($futurdate) as $ligne) {
                echo "
            <table class='appoint_futur '>
            <thead>
            <tr>
            <th>" . $ligne[0] . "</th>
            </tr>
            </thead>";
                $futurd = Days($ligne[0], $id_user, $pdo);

                foreach ($futurd as $ligne) {

                    echo "
                    <tbody  class='card_futur'>
                <tr > <td>heure : " . $ligne[0] . "</td>
               <tr > <td>label : " . $ligne[2] . "</td>
               <tr > <td>Nom : " . $ligne["nom_client"] . "</td></tr>
               <tr ><td>Prenom : " . $ligne["prenom_client"] . "</td></tr>
                
                
                <td>
                <form method='post' action='controler_info_client.php'>
                <p>
                <input type='number' name='id_client' id='id_client' value='" . $ligne[1] . "' hidden />               
                <input type='submit' value='Info client' />
                
                </p>
                </form>
                </tbody>
                ";
                };
                echo "
            </table>";
            }
        }
        if ($_SESSION == null) {
            header("location: connexion.php");
        }
        ?>
    </div>
</body>

</html>