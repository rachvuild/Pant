<!DOCTYPE html>
<html lang="en">

<body>
    <form class="register_client" method="post" action="homePageCom.php">
        <fieldset class="client">
            <legend>Prise de Rendez-Vous</legend>
            <label for="">Entrez l' ID du client: </label><select name="client" id="client">
                <?php
                session_start();
                $id_user  = $_SESSION["id_user"];
                $req = $pdo->prepare("SELECT * FROM `appointment` AS a INNER JOIN client AS c ON c.id_client = a.id_client WHERE a.id_user='$id_user' GROUP BY a.id_client ");
                $req->execute();
                while ($donnees = $req->fetch()) {
                    var_dump($donnees);
                    echo "<option value=" . $donnees['id_client'] . ">" . $donnees['label_client'] . "</option>";
                }
                $req->closecursor();
                ?>
            </select><br>
            <label for="">Choissisez une Date : </label><input type="date" name="date"><br />
            <label for="">Choissisez une Plage Horaire : </label> <select name="horaire" id="horaire">
                <option value="" selected> Plage Horaire</option>
                <option value="matin">Matinée</option>
                <option value="aprem">Après-Midi</option>
            </select> <br />
            <input type='text' name='id_user' id='id_user' value=<?php echo $id_user; ?> hidden />
            <input type="submit" name="envoyer" value="OK" />

        </fieldset>
    </form>
</body>

</html>