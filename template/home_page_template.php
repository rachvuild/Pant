<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hmm</title>
    <link rel="stylesheet" href="../../assert/style.css">
</head>


<body class="bodyCom">

    <div class="header ">
        <div class="header">
            <p><?= $id_user ?></p>
            <?php
            if ($id_job == 2) {
                echo "<a href='list.php'>Mon équipe</a>";
            }
            if ($id_job == 1 or $id_job == 2) {
                echo "<a href='report_controller.php'>Mes comptes rendu</a>";
            }
            ?>
            <a href="../../template/destroy.php">se deconnecter</a>
        </div>
    </div>
    <div class="parent">
        <div class="PriseRDV srollbar">
            <form class="register_client" method="post" action="homePageCom.php">
                <fieldset class="client">
                    <legend>Prise de Rendez-Vous</legend>
                    <label for="">Entrez l' ID du client: </label><select name="client" id="client">
                        <?php
                        session_start();
                        $id_user  = $_SESSION["id_user"];
                        $req = $pdo->prepare("SELECT * FROM `appointment` AS a INNER JOIN client AS c ON c.id_client = a.id_client WHERE a.id_user='$id_user' GROUP BY a.id_client ");
                        $req->execute();
                        while ($donnees = $req->fetch()) {
                            var_dump($donnees);
                            echo "<option value=" . $donnees['id_client'] . ">" . $donnees['label_client'] . "</option>";
                        }
                        $req->closecursor();
                        ?>
                    </select><br>
                    <label for="">Choissisez une Date : </label><input type="date" name="date"><br />
                    <label for="">Choissisez une Plage Horaire : </label> <select name="horaire" id="horaire">
                        <option value="8">8h</option>
                        <option value="9">9h</option>
                        <option value="10"> 10h</option>
                        <option value="11"> 11h</option>
                        <option value="14">14h</option>
                        <option value="15">15h</option>
                        <option value="16"> 16h</option>
                        <option value="17"> 17h</option>
                    </select> <br />
                    <input type='text' name='id_user' id='id_user' value=<?php echo $id_user; ?> hidden />
                    <input type="submit" name="envoyer" value="OK" />

                </fieldset>
            </form>
            <form class=" register_client" action="../Entity/Client.php" method="post">
                <fieldset class=" client">
                    <legend>Création d'un nouveau client</legend>

                    <label for="nom">Nom :</label>
                    <input type="text" maxlength="255" name="nom"><br>

                    <label for="prenom">Prenom :</label>
                    <input type="text" maxlength="255" name="prenom"><br>

                    <label for="email">E-mail :</label>
                    <input type="text" maxlength="255" name="email"><br>

                    <label for="phone">Téléphone :</label>
                    <input type="text" maxlength="10" name="phone"><br>

                    <label for="city">Ville :</label>
                    <input type="text" maxlength="255" name="city"><br>

                    <label for="address">Adresse :</label>
                    <input type="text" maxlength="255" name="address"><br>

                    <label for="pc"> Code postal :</label>
                    <input type="text" minlength="5" maxlength="5" name="pc"><br>

                    <label for="label">Label :</label>
                    <input type="text" maxlength="255" name="label"><br>

                    <label for="">Choissisez une Date : </label>
                    <input type="date" name="date"><br />

                    <label for="">Choissisez une Plage Horaire : </label>
                    <select name="horaire" id="PlageHoraire">

                        <option value="8">8h</option>
                        <option value="9">9h</option>
                        <option value="10"> 10h</option>
                        <option value="11"> 11h</option>
                        <option value="14">14h</option>
                        <option value="15">15h</option>
                        <option value="16"> 16h</option>
                        <option value="17"> 17h</option>

                    </select> <br />
                    <input type="submit" value="Ajouter votre client" name="REGISTER_CLIENT">
                </fieldset>
            </form>
        </div>
        <div class="conterondu srollbar">
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

                        <input type='submit' value='rédiger compte rendu' />
                    
                    </p>
                    </form></td> 
                    </tr>  
                    </tbody>
                    ";
                    }
                    echo "
            </table>";
                }
            }
            ?>
        </div>
        <div class="RdvEnCour srollbar">
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

                ?>
            </div>
        </div>



    </div>

</body>

</html>