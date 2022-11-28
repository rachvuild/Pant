<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB</title>
    <link rel="stylesheet" href="../../assert/style.css">
<body>
    <form class="register_client" method="post" action="homePageCom.php">
        <fieldset class="client">
            <legend>Prise de Rendez-Vous</legend>
            <label for="">Entrez l' ID du client: </label><select name="client" id="client">
                <?php
                session_start();
                if(isset($_POST['rdv'])){
                    $id_user=$_POST['id_user'];
                    $req = $pdo->prepare("SELECT id_client, nom_client FROM client");
                    $req->execute();
                    while ($donnees =$req->fetch()){
                        var_dump($donnees);
                        echo "<option value=" . $donnees['id_client'] . ">" . $donnees['nom_client'] . "</option>";
                    }
                    $req->closecursor();
                }
                else{
                    $id_user  = $_SESSION["id_user"];
                    $req = $pdo->prepare("SELECT * FROM `appointment` AS a INNER JOIN client AS c ON c.id_client = a.id_client WHERE a.id_user='$id_user' GROUP BY a.id_client ");
                    $req->execute();
                    while ($donnees = $req->fetch()) {
                        var_dump($donnees);
                        echo "<option value=" . $donnees['id_client'] . ">" . $donnees['label_client'] . "</option>";
                    }
                    $req->closecursor();
                }
                ?>
            </select><br>
            <label for="">Choissisez une Date : </label><input type="date" name="date"><br />
            <label for="">Choissisez une Plage Horaire : </label> <select name="horaire" id="horaire">
                <option value="8">8h</option>
                <option value="9">9h</option>
                <option value="10"> 10h</option>
                <option value="11"> 11h</option>
                <option value="14">14h</option>
                <option value="15">15h</option>
                <option value="16"> 16h</option>
                <option value="17"> 17h</option>
            </select> <br />
            <input type='text' name='id_user' id='id_user' value='<?= $id_user ?>' hidden/>
            <input type="submit" name="<?php if(isset($_POST['rdv'])){echo "appointbis";}else {echo "appoint";} ?>" value="OK" />

        </fieldset>
    </form>
</body>

</html>