<!DOCTYPE html>
<html lang="en">


<body>
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
</body>

</html>
<?php
if ($_SESSION == null) {
    header("location: index.php");
}
?>