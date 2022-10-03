<?php

$pc = $_POST['pc'];
$city = $_POST['city'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$label = $_POST['label'];

$register_clients = "INSERT INTO `client`(`id_client`, `pc_client`, `city_client`, `address_client`, `phone_client`, `label_client`, `comment_client`)
    VALUES ('','$pc','$city','$address','$phone','$label','')";

    $register_clients = $pdo->prepare($register_clients);
    $register_clients->execute();
    $register_clients->fetchAll();