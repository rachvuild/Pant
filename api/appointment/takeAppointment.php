<?php
include('../connection/connection.php');
$token = htmlspecialchars($_POST["token"]);
$idUser = htmlspecialchars($_POST["id_user"]);
$idClient = htmlspecialchars($_POST["idClient"]);
$timestamp = htmlspecialchars($_POST["timestamp"]);
$date = htmlspecialchars($_POST["date"]);
if (!empty($token) or !empty($idUser)) {
    $verif = verifTok($token, $pdo);
    if ($verif === 1) {
        include('../../src/ConnectionBdd.php');
        include('../../src/Entity/Appointment.php');
        appointement($date, $timestamp, $idClient, $idUser, $pdo);
        echo json_encode(["status" => 200, "message" => "Success"]);
    } else {
        echo json_encode(["status" => 400, "message" => "Error"]);
    }
}
