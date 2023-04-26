<?php
include('../connection/vertif.php');
$token = $_POST["token"];
$idUser = htmlspecialchars($_POST["id_user"]);
$idClient = htmlspecialchars($_POST["idClient"]);
$timestamp = htmlspecialchars($_POST["timestamp"]);
$date = htmlspecialchars($_POST["date"]);

if (!empty($token) and !empty($idUser)) {

    include('../../src/ConnectionBdd.php');
    $verif = verifTok($token, $pdo);


    if ($verif === 1) {



        $timestamp = date('H:i:s', mktime($timestamp, 0, 0));

        $test = $pdo->prepare("SELECT `hour_appoint`, `date_appoint` FROM `appointment` WHERE `id_user` = '$idUser' AND `hour_appoint` = '$timestamp' AND `date_appoint`='$date'");


        $test->execute();
        $testAppoint = $test->fetch();


        if (empty($testAppoint)) {
            $rdv = "INSERT INTO `appointment` (`id_appoint`, `date_appoint`, `hour_appoint`, `id_user`, `id_client`) VALUES (NULL, '$date', '$timestamp', '$idUser', '$idClient')";
            $newAppoint = $pdo->prepare($rdv);
            $newAppoint->execute();
            echo json_encode(["status" => 200, "message" => "Success"]);
        } else {

            echo json_encode(["status" => 400, "message" => "Plage déjà utilisé"]);
        }
    } else {
        echo json_encode(["status" => 400, "message" => "Error"]);
    }
} else {
    echo json_encode(["status" => 400, "message" => "Error"]);
}
