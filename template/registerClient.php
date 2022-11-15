<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../Entity/Client.php" method="post">
        <fieldset>
            <legend>Création d'un nouveau client</legend>

            <label for="nom">Nom :</label>
            <input type="text" maxlength="255" name="nom">

            <label for="prenom">Prenom :</label>
            <input type="text" maxlength="255" name="prenom">

            <label for="email">E-mail :</label>
            <input type="text" maxlength="255" name="email">

            <label for="phone">Téléphone :</label>
            <input type="text" maxlength="10" name="phone">

            <label for="city">Ville :</label>
            <input type="text" maxlength="255" name="city">

            <label for="address">Adresse :</label>
            <input type="text" maxlength="255" name="address">

            <label for="pc"> Code postal :</label>
            <input type="text" minlength="5" maxlength="5" name="pc">

            <label for="label">Label :</label>
            <input type="text" maxlength="255" name="label">

            <label for="">Choissisez une Date : </label>
            <input type="date" name="date"><br />

            <label for="">Choissisez une Plage Horaire : </label>
            <select name="horaire" id="PlageHoraire">
                <option value="" selected> Plage Horaire</option>
                <option value="matin">Matinée</option>
                <option value="aprem">Après-Midi</option>
            </select> <br />
            <input type="submit" value="Ajouter votre client" name="REGISTER_CLIENT">
        </fieldset>
    </form>
</body>

</html>