
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../Entity/update_report_entity.php" method="post">
        <fieldset>
            </p>
            <fieldset>
                <legend>Modification du compte rendu client</legend>

                <label for="summary">Compte rendu :</label>
                <textarea name="summary" cols="30" rows="10"></textarea>

                <input type='number' name='id_report' id='id_report' value='<?= $id_report?>' hidden /><br/>

                <label for="interest">Clients toujours intéressé ?</label>
                <select name="interest" id="">
                    <option value="Pas intéréssé">Pas intéressé</option>
                    <option value="Intéressé à revoir">Intéressé à revoir</option>
                    <option value="Très intéréssé">Très intéressé</option>
                </select>
            </fieldset>

            <input type="submit" value="UPDATE_REPORT" name="UPDATE_REPORT">
        </fieldset>
    </form>

</body>

</html>