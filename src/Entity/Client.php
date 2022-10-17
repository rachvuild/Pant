<?php
// Connection to database
require('../ConnectionBdd.php');
require('../Controller/UserController.php');

// Register client in database
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


// Update client in database
if (isset($_POST['UPDATE_CLIENT'])){
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
}

// Register Report in database
if (isset($_POST['REGISTER_REPORT'])){
    $pdo = ConnexionBdd();
    // Get data from registerClient.html form
    $id_client = $_POST['id'];
    $id_user = $_POST['id_user'];
    $summary = $_POST['summary'];
    $interest = $_POST['interest'];
    RegisterReport(
        $pdo,
        $id_user,
        $id_client,
        $summary,
        $interest
    );
}