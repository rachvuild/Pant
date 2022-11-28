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
    <div class="container_form2">
        <h1>Rédiger votre commentaire</h1>
        <form method='post' action='../Entity/insert_com_entity.php'>
            <p>
                <label for="com">Votre commentaire</label>: <input type='text' name='com' id='com' />
                <input type='submit' value='valider' name='valider' />
                <input type="number" value="<?= $id_report ?>" name="id_report" hidden>
            </p>
        </form>

        <h1>Compte-rendu sélectionné</h1>
        <?php
        foreach ($commentary as $ligne) {
            echo "
                <table class='table_cr'>
                    <thead>
                    <tr>
                    <th>Rapport</th>
                    <th>Interet</th>
                    <th>Utilisateur</th>
                </tr>
                </thead>
                <tbody>
                    <td>" . $ligne[0] . "</td>
                    <td>" . $ligne[1] . "</td>
                    <td>" . $ligne[2] . "</td></tbody>";
        }
        if ($_SESSION == null) {
            header("location: index.php");
        }
        ?>
    </div>
</body>

</html>