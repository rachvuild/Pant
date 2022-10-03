<?php
require('../ConnectionBdd.php');
$pdo = ConnexionBdd();

$cp = $_POST['cp'];
$city = $_POST['city'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$label = $_POST['label'];

$register_client = "INSERT INTO `client`(`id_client`, `pc_client`, `city_client`, `address_client`, `phone_client`, `label_client`, `comment_client`)
 VALUES ('','$cp','$city','$address','$phone','$label','')";

$register_client = $pdo->prepare($register_client);
$register_client->execute();
$register_client->fetchAll();