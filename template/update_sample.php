<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container_sample">
    <form action="../Controller/modif_sample.php" method="post">
    <h2>Modification d'échantillon</h2>
    <label for="label">Nom échantillon :</label>
    <select name='id_sample'>
        <?php
            if($sample_req->execute()){
                foreach($pdo->query($sample) AS $ligne){
                    echo 
                    "
                        <option value='". $ligne[0]. "'>
                            ".$ligne[1]."
                        </option>
                    ";
                    }
                }
                
                ?>
        </select>
        <input type='text' name='label_sample'>
        <input type='submit' value='Modifier' name='UPDATE_SAMPLE'>
    </form>
    </div>
</body>
</html>