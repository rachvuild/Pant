

<?php

session_start();
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
}
$id_user = $_SESSION["id_user"];
$id_job = $_SESSION["roles_user"];
include_once('../ConnectionBdd.php');

require "../../template/header.php";
require('../Entity/entity_homepage.php');
if (!empty($_POST['appoint'])) {
    $date = htmlspecialchars($_POST['date']);
    $timestamp = htmlspecialchars($_POST['horaire']);
    $idClient = htmlspecialchars($_POST['client']);
    require "../Entity/Appointment.php";
    appointement($date, $timestamp, $idClient, $id_user, $pdo);
}
if (!empty($_POST['appointbis'])) {
    $date = htmlspecialchars($_POST['date']);
    $timestamp = htmlspecialchars($_POST['horaire']);
    $idClient = htmlspecialchars($_POST['client']);
    $id_user = htmlspecialchars($_POST['id_user']);
    require "../Entity/Appointment.php";
    appointement($date, $timestamp, $idClient, $id_user, $pdo);
}
if (!empty($_POST['REGISTER_CLIENT'])) {
    $pc = htmlspecialchars($_POST['pc']);
    $city = htmlspecialchars($_POST['city']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $label = htmlspecialchars($_POST['label']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $timestamp = htmlspecialchars($_POST['horaire']);
    $date = htmlspecialchars($_POST['date']);
    // if (stristr($email, '@') == true) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        require "../Entity/client.php";
        registerClient($pc, $city, $address, $phone, $label, $nom, $prenom, $email, $timestamp, $date, $id_user, $pdo);
    } else {
        echo "<script>alert('le champs email à été mal rediger') </script>";
    }
}
require('../../template/home_page_template.php');

?>