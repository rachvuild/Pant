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
    <div class="container_form">
        <form action="sampleController.php" method="post">
            <legend><strong>Compte rendu de : <?= $_POST['label_client'] ?></strong></legend>
            <div class="container_form2">
                <h2>Echantillons donnés</h2>
                <p> Indiquez la référence et le nombre d'échantillon donnés : <br />
                    <?php
                    foreach ($sampleAll as $ligne) {
                        // var_dump($ligne);
                        echo
                        "<input type='checkbox' name='" . $ligne[0] . "' id='" . $ligne[0] . "'> 
                            <label for='" . $ligne[0] . "'>" . $ligne[1] . "</label>

                            <label for='" . $ligne[1] . "'>nombre donné :</label>
                            <input type='number' name='" . $ligne[1] . "' id='" . $ligne[1] . "'><br/>";
                    }
                    // }
                    if ($_SESSION == null) {
                        header("location: connexion.php");
                    }
                    ?>
            </div>
            </p>
            <div class="container_form2">
                <h2>Création de compte rendu client</h2>

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
                <label for="date">entrez la date du compt rendu:</label>
                <input type='datetime-local' name='date' /><br />
            </div>

            <input type="submit" value="Envoyé" name="REPORT_CLIENT">
        </form>
    </div>
</body>

</html>