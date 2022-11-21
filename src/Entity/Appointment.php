<?php
if (isset($_POST['envoyer'])) {

    $date = $_POST['date'];
    $timestamp = $_POST['horaire'];
    $idClient = $_POST['client'];

    if ($date != NULL && $timestamp != NULL && $idClient != NULL) {


        $db = ConnexionBdd();
        $timestamp = date('H:i:s', mktime($timestamp, 0, 0));
        $test = $db->prepare("SELECT `hour_appoint`, `date_appoint` FROM `appointment` WHERE `id_user` = '$id_user' AND `hour_appoint` = '$timestamp' AND `date_appoint`='$date'");
        $test->execute();
        $testAppoint = $test->fetch();


        if (empty($testAppoint)) {
            $rdv = "INSERT INTO `appointment` (`id_appoint`, `date_appoint`, `hour_appoint`, `id_user`, `id_client`) VALUES (NULL, '$date', '$timestamp', '$id_user', '$idClient'); ";
            $newAppoint = $db->prepare($rdv);
            $newAppoint->execute();
            echo "<script> alert('rdv ajouté'); </script>";
        } else {
            echo "<script> alert('heur ou la date et deja prix'); </script>";
        }
    } else {
    }
} else {
}
