<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB</title>
    <link rel="stylesheet" href="../../assert/style.css">
</head>


<body class="bodyCom">

    <div class="homePageMenu">

        <h1 id="PRDV" class="h1menu">Prise de Rendez-vous</h1>
        <h1 id="RDVV" class="h1menu">Rendez-vous à venir</h1>
        <h1 id="RDVP" class="h1menu">Rendez-vous réalisé</h1>

    </div>
    <div class="parent">
        <div class="PriseRDV srollbar">
            <div class="register_client  ">
                <fieldset class="client">
                    <legend>Prise de Rendez-Vous</legend>

                    <form method="post" action="homePageCom.php">
                        <label for="">Entrez le nom du client: </label><select name="client" id="client">
                            <?php
                            session_start();
                            $id_user  = $_SESSION["id_user"];
                            $req = $pdo->prepare("SELECT * FROM `appointment` AS a INNER JOIN client AS c ON c.id_client = a.id_client WHERE a.id_user='$id_user' GROUP BY a.id_client ");
                            $req->execute();
                            while ($donnees = $req->fetch()) {

                                echo "<option value=" . $donnees['id_client'] . ">" . $donnees['nom_client'] . "</option>";
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
                        <input type="submit" name="appoint" value="OK" />

                </fieldset>

            </div>
            <form class=" register_client" action="homePageCom.php" method="post">
                <fieldset class=" client">
                    <legend>Création d'un nouveau client</legend>
                    <div class="labal-new-client">
                        <label for="nom">Nom :</label>
                        <input class="input-crea" type="text" maxlength="255" name="nom"><br>
                    </div>
                    <div class="labal-new-client">
                        <label for="prenom">Prénom :</label>
                        <input class="input-crea" type="text" maxlength="255" name="prenom"><br>
                    </div>
                    <div class="labal-new-client">
                        <label for="email">E-mail :</label>
                        <input class="input-crea" type="text" maxlength="255" name="email"><br>
                    </div>
                    <div class="labal-new-client">
                        <label for="phone">Téléphone :</label>
                        <input class="input-crea" type="text" maxlength="10" name="phone"><br>
                    </div>
                    <div class="labal-new-client">
                        <label for="city">Ville :</label>
                        <input class="input-crea" type="text" maxlength="255" name="city"><br>
                    </div>
                    <div class="labal-new-client">
                        <label for="address">Adresse :</label>
                        <input class="input-crea" type="text" maxlength="255" name="address"><br>
                    </div>
                    <div class="labal-new-client">
                        <label for="pc"> Code postal :</label>
                        <input class="input-crea" type="text" minlength="5" maxlength="5" name="pc"><br>
                    </div>
                    <div class="labal-new-client">
                        <label for="label">Label :</label>
                        <input class="input-crea" type="text" maxlength="255" name="label"><br>
                    </div>
                    <div class="labal-new-client">
                        <label for="">Choissisez une Date : </label>
                        <input class="input-crea" type="date" name="date"><br />
                    </div>
                    <div class="labal-new-client">
                        <label for="">Choissisez une Plage Horaire : </label>
                        <select class="input-crea" name=" horaire" id="PlageHoraire">

                            <option value="8">8h</option>
                            <option value="9">9h</option>
                            <option value="10"> 10h</option>
                            <option value="11"> 11h</option>
                            <option value="14">14h</option>
                            <option value="15">15h</option>
                            <option value="16"> 16h</option>
                            <option value="17"> 17h</option>

                        </select> <br />
                    </div>
                    <input type="submit" value="Ajouter votre client" name="REGISTER_CLIENT">
                </fieldset>
            </form>
        </div>
        <div class="conterondu srollbar">
            <h1>Rendez-vous réalisés</h1>
            <?php
            if ($past->execute()) {
                foreach ($pdo->query($pastdate) as $ligne) {
                    echo "
            <table class='appoint_futur'>
            <thead>
            <tr>
            <th>" . $ligne[0] . "</th>
            </tr>
            </thead>";
                    $pastd = Dayspast($ligne[0], $id_user, $pdo);

                    foreach ($pastd as $ligne) {

                        echo "
                <tbody class='card_futur'><tr>
                   <tr> <td>Heure : " . $ligne[1] . "</td></tr>
                   <tr> <td>Label : " . $ligne[5] . "</td></tr>
                   <tr> <td>Nom : " . $ligne["nom_client"] . "</td></tr>
                   <tr> <td>Prénom : " . $ligne["prenom_client"] . "</td></tr>
                    <td><form method='post' action='sampleController.php'>
                    <p>
                        <input type='number' name='id_appoint' id='id_appoint' value='" . $ligne[2] . "' hidden />
                        <input type='text' name='id_user' id='id_user' value='" . $ligne[3] . "' hidden />
                        <input type='number' name='id_client' id='id_client' value='" . $ligne[4] . "' hidden />
                        <input type='text' name='label_client' id='label_client' value='" . $ligne[5] . "' hidden />                

                        <input type='submit' value='Rédiger compte rendu' name='cr'/>
                    
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
        <tr > <td>Heure : " . $ligne[0] . "</td>
       <tr > <td>Label : " . $ligne[2] . "</td>
       <tr > <td>Nom : " . $ligne["nom_client"] . "</td></tr>
       <tr ><td>Prénom : " . $ligne["prenom_client"] . "</td></tr>
        
        
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
        </div>



    </div>
    <script src="../../assert/script.js"></script>
</body>

</html>