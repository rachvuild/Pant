<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB</title>
    <link rel="stylesheet" href="../../assert/style.css">

<body>
    <div class="rdvn1">
        <div class="clientn1">
            <form class="register_client" method="post" action="homePageCom.php">
                <fieldset class="client">
                    <legend class="n1rdv">Prise de Rendez-Vous pour : <?= $id_user ?></legend>
                    <label for="">Entrez le nom du client: </label>
                    <select name="client" id="client" class="n1rdv">
                        <?php
                        if (isset($_POST['rdv'])) {
                            $id_user = $_POST['id_user'];
                            $req = $pdo->prepare("SELECT * FROM `appointment` AS a INNER JOIN client AS c ON c.id_client = a.id_client WHERE a.id_user='$id_user' GROUP BY a.id_client");
                            $req->execute();
                            while ($donnees = $req->fetch()) {

                                echo "<option value=" . $donnees['id_client'] . ">" . $donnees['nom_client'] . "</option>";
                            }
                            $req->closecursor();
                        } else {
                            $req = $pdo->prepare("SELECT * FROM `appointment` AS a INNER JOIN client AS c ON c.id_client = a.id_client WHERE a.id_user='$id_user' GROUP BY a.id_client ");
                            $req->execute();
                            while ($donnees = $req->fetch()) {

                                echo "<option value=" . $donnees['id_client'] . ">" . $donnees['label_client'] . "</option>";
                            }
                            $req->closecursor();
                        }
                        ?>
                    </select><br>
                    <label for="">Choissisez une Date : </label><input type="date" name="date" class="n1rdv"><br />
                    <label for="">Choissisez une Plage Horaire : </label> <select name="horaire" id="horaire" class="n1rdv">
                        <option value="8">8h</option>
                        <option value="9">9h</option>
                        <option value="10"> 10h</option>
                        <option value="11"> 11h</option>
                        <option value="14">14h</option>
                        <option value="15">15h</option>
                        <option value="16"> 16h</option>
                        <option value="17"> 17h</option>
                    </select> <br />
                    <input type='text' name='id_user' id='id_user' value='<?= $id_user ?>' hidden />
                    <input type="submit" name="<?php if (isset($_POST['rdv'])) {
                                                    echo "appointbis";
                                                } else {
                                                    echo "appoint";
                                                } ?>" value="OK" />

                </fieldset>
            </form>
        </div>
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
                header("location: index.php");
            }
            ?>
        </div>
    </div>
</body>

</html>