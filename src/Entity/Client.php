<?php
// Connection to database
require('../ConnectionBdd.php');
$pdo = ConnexionBdd();
session_start();

// ==================================================================================================================================================
// Register Client
if (isset($_POST['REGISTER_CLIENT'])) {
    $pc = $_POST['pc'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $label = $_POST['label'];
    // Insert data in client table
    $register_clients = "INSERT INTO `client`(`pc_client`, `city_client`, `address_client`, `phone_client`, `label_client`)
VALUES ('$pc','$city','$address','$phone','$label')";

    $register_clients = $pdo->prepare($register_clients);
    $register_clients->execute();
    $register_clients->fetchAll();
}

// ==================================================================================================================================================
// Update Client

if (isset($_POST['UPDATE_CLIENT'])) {
    $id_client = $_POST['id'];
    $pc = $_POST['pc'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $label = $_POST['label'];
    $update_client = "UPDATE client SET ";
    if (!empty($pc)) {
        $update_client = $update_client . "pc_client= '" . $pc . "',";
    }
    if (!empty($city)) {
        $update_client = $update_client . "city_client= '" . $city . "',";
    }
    if (!empty($age)) {
        $update_client = $update_client . "address_client= " . $address . ",";
    }
    if (!empty($mail)) {
        $update_client = $update_client . "phone_client= '" . $phone . "',";
    }
    if (!empty($tel)) {
        $update_client = $update_client . "label_client= '" . $label . "',";
    }
    $update_client = substr($update_client, 0, -1) . " WHERE id_client=" . $id_client;
    echo $update_client;
    $update_client = $pdo->prepare($update_client);
    $update_client->execute();
}