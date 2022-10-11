<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Echantillons donnés</legend>
            <p> Indiquez la référence et le nombre d'échantillon donnés : <br/>
            <?php
                if ($sample_req->execute()){
                    foreach ($pdo->query($sample) AS $ligne){
                        echo 
                            "<input type='checkbox' name='".$ligne[0]."' id='".$ligne[1]."'> 
                            <label for='".$ligne[0]."'>".$ligne[1]."</label><br/>

                            <label for='".$ligne[1]."'>nombre donné :</label>
                            <input type='number' name'".$ligne[1]."' id='".$ligne[1]."'><br/>";
                    }
                }
            ?>
            </p>

            <legend>Création de compte rendu client</legend>

            <label for="id_client">ID Client :</label>
            <input type="text" name="id_client">

            <label for="id_user">ID User</label>
            <input type="text" name="id_user">

            <label for="summary">Compte rendu :</label>
            <input type="text" name="summary">

            <label for="interest">Clients toujours intéressé ?</label>
            <input type="text" name="interest">

            <input type="submit" value="REPORT_CLIENT" name="REPORT_CLIENT">
        </fieldset>
    </form>
</body>
</html>