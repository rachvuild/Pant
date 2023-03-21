<?php
function appointement($date, $timestamp, $idClient, $id_user, $pdo)
{
    if ($date != NULL && $timestamp != NULL && $idClient != NULL) {

        $timestamp = date('H:i:s', mktime($timestamp, 0, 0));

        $test = $pdo->prepare("SELECT `hour_appoint`, `date_appoint` FROM `appointment` WHERE `id_user` = '$id_user' AND `hour_appoint` = '$timestamp' AND `date_appoint`='$date'");
        $test->execute();
        $testAppoint = $test->fetch();


        if (empty($testAppoint)) {
            $rdv = "INSERT INTO `appointment` (`id_appoint`, `date_appoint`, `hour_appoint`, `id_user`, `id_client`) VALUES (NULL, '$date', '$timestamp', '$id_user', '$idClient'); ";
            $newAppoint = $pdo->prepare($rdv);
            $newAppoint->execute();
            echo "<script> alert('rdv ajouté'); </script>";
        } else {
            echo "Plage déjà utilisé";
        }
    } else echo "Veuillez remplir tous les champs";
}

if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
}
