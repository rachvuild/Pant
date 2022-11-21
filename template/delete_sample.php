<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../Controller/modif_sample.php" method="post">
    <th>Delete</th>
        <?php
            if($sample_req->execute()){
                foreach($pdo->query($sample) AS $ligne){
                    echo 
                    "<p>
                        <input type='checkbox' name='id_sample' value='" . $ligne[0] . "' id='" . $ligne[0] . "'> 
                        <label for='" . $ligne[0] . "'>" . $ligne[1] . "</label><br/>
                    </p>";
                    }
            }

        ?>

        <input type='submit' value='Delete échantillon' name='DELETE_SAMPLE'>
    </form>
</body>
</html>