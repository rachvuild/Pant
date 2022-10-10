<?php
// Connection to database
require('../ConnectionBdd.php');
require('../Controller/UserController.php');
if (isset($_POST['REGISTER_CLIENT'])){
    $pdo = ConnexionBdd();
    // Get data from registerClient.html form
    $pc = $_POST['pc'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $label = $_POST['label'];
    RegisterClient(
        $pdo,
        $pc,
        $city,
        $address,
        $phone,
        $label
    );
}

if (isset($_POST['UPDATE_CLIENT']))
    $pdo = ConnexionBdd();
    // Get data from registerClient.html form
    $id_client = $_POST['id'];
    $pc = $_POST['pc'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $label = $_POST['label'];
    UpdateClient(
        $pdo,
        $id_client,
        $pc,
        $city,
        $address,
        $phone,
        $label
    );