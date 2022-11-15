<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
</head>

<body>
    <form method="post" action="homePageCom.php">
        <fieldset>
            <legend>Prise de Rendez-Vous</legend>
            <label for="">Entrez l' ID du client: </label><select name="client" id="client">
                <?php 
                $req = $pdo -> prepare("SELECT * FROM `appointment` AS a INNER JOIN client AS c ON c.id_client = a.id_client WHERE a.id_user='a.dochez' GROUP BY a.id_client ");
                $req -> execute();
                while ($donnees = $req->fetch())
                {
                    echo "<option value=".$donnees['id_client'].">".$donnees['label_client']."</option>";
                }
                $req -> closecursor();
                ?> 
            </select>
            <label for="">Choissisez une Date : </label><input type="date" name="date"><br />
            <label for="">Choissisez une Plage Horaire : </label> <select name="horaire" id="horaire">
                <option value="" selected> Plage Horaire</option>
                <option value="matin">Matinée</option>
                <option value="aprem">Après-Midi</option>
            </select> <br />
            <input type='text' name='id_user' id='id_user' value=<?php echo $id_user; ?> hidden />
            <input type="submit" name="envoyer" value="OK" />

        </fieldset>
    </form>
</body>

</html>