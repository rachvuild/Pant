<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../Entity/registerReport.php" method="post">
        <fieldset>
            <fieldset>
                <legend>Echantillons donnés</legend>
                <p> Indiquez la référence et le nombre d'échantillon donnés : <br />
                    <?php
                    if ($sample_req->execute()) {
                        foreach ($pdo->query($sample) as $ligne) {
                            echo
                            "<input type='checkbox' name='" . $ligne[0] . "' id='" . $ligne[0] . "'> 
                            <label for='" . $ligne[0] . "'>" . $ligne[1] . "</label><br/>

                            <label for='" . $ligne[1] . "'>nombre donné :</label>
                            <input type='number' name='" . $ligne[1] . "' id='" . $ligne[1] . "'><br/>";
                        }
                    }
                    ?>
            </fieldset>

            </p>
            <fieldset>
                <legend>Création de compte rendu client</legend>

                <input type='number' name='id_appoint' id='id_appoint' value='<?= $_POST['id_appoint'] ?>' hidden /><br />
                <input type='text' name='id_user' id='id_user' value='<?= $_POST['id_user'] ?>' hidden /><br />
                <input type='number' name='id_client' id='id_client' value='<?= $_POST['id_client'] ?>' hidden /><br />

                <label for="summary">Compte rendu :</label>
                <textarea name="summary" cols="30" rows="10"></textarea>

                <label for="interest">Clients toujours intéressé ?</label>
                <select name="interest" id="">
                    <option value="Pas intéréssé">Pas intéressé</option>
                    <option value="Intéressé à revoir">Intéressé à revoir</option>
                    <option value="Très intéréssé">Très intéressé</option>
                </select>
            </fieldset>

            <input type="submit" value="REPORT_CLIENT" name="REPORT_CLIENT">
        </fieldset>
    </form>

</body>

</html>