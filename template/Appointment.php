<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
</head>
<body>
    <form method="post" action="takeAppoint.php">
        <fieldset>
            <legend>Prise de Rendez-Vous</legend>
            <label for="">Entrez l' ID du client: </label><input type="text" name="client" ><br/>
            <label for="">Choissisez une Date : </label><input type="date" name="date"><br/>
            <label for="">Choissisez une Plage Horaire : </label> <select name="horaire" id="PlageHoraire">
                <option value="" selected> Plage Horaire</option>
                <option value="matin">Matinée</option>
                <option value="aprem">Après-Midi</option>
            </select> <br/>
            <input type='text' name='id_user' id='id_user' value= <?php echo $id_user; ?>  hidden />
            <input type="submit" name="envoyer" value="OK"/>

        </fieldset>
    </form>
</body>
</html>