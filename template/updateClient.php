<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB</title>
</head>

<body>
    <form action="../src/Controller/updateClientController.php" method="post">
        <fieldset>
            <legend>Modification de client</legend>

            <label for="id">ID Client :</label>
            <input type="text" name="id">

            <label for="pc"> Code postal :</label>
            <input type="text" name="pc">

            <label for="city">Ville :</label>
            <input type="text" name="city">

            <label for="address">Adresse :</label>
            <input type="text" name="address">

            <label for="phone">Téléphone :</label>
            <input type="text" name="phone">

            <label for="label">Label :</label>
            <input type="text" name="label">

            <input type="submit" value="UPDATE_CLIENT" name="UPDATE_CLIENT">
        </fieldset>
    </form>
</body>

</html><?php if ($_SESSION == null) {
            header("location: connexion.php");
        } ?>