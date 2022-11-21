<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaire</title>
</head>
<body>
    <h1>Rédiger votre commentaire</h1>
    <form method='post' action='../Entity/insert_com_entity.php'>
        <p> 
            <label for="com">Votre commentaire</label>: <input type='text' name='com' id='com' /><br/>
            <input type="number" value="<?= $id_report ?>" name="id_report" hidden>              
            <input type='submit' value='valider' name='valider' />                           
        </p>
    </form>
    <h1>Compte-rendu sélectionné</h1>
    <?php
    foreach($commentary AS $ligne){
        echo "
                <table>
                    <thead>
                    <tr>
                    <th>Rapport</th>
                    <th>Interet</th>
                    <th>Utilisateur</th>
                </tr>
                </thead>
                <tbody>
                    <td>".$ligne[0]."</td>
                    <td>".$ligne[1]."</td>
                    <td>".$ligne[2]."</td></tbody>";

    }
    ?>
</body>
</html>