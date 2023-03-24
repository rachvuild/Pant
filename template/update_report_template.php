<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assert/style.css">
    <title>GSB</title>
</head>

<body>
    <div class="container_form3">
        <form action="update_report_controller.php" method="post">
            <h2>Modification du compte rendu client</h2>

            <?php
            while ($donne = $label->fetch()) {
                $comment = $donne['summary_report'];
            }
            if ($_SESSION == null) {
                header("location: connexion.php");
            }
            ?>
            <div class="cr_form">
                <label for="summary">Compte rendu :</label>
                <textarea name="summary" cols="100" rows="5"><?= $comment ?></textarea>
            </div>
            <br />
            <input type='number' name='id_report' id='id_report' value='<?= $id_report ?>' hidden /><br />

            <label for="interest">Client toujours intéressé ?</label>
            <select name="interest" id="">
                <option value="Pas intéréssé">Pas intéressé</option>
                <option value="Intéressé à revoir">Intéressé à revoir</option>
                <option value="Très intéréssé">Très intéressé</option>
            </select>

            <input type="submit" value="Mettre à jour" name="UPDATE_REPORT">
        </form>
    </div>
</body>

</html>