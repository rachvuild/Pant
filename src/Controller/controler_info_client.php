<?php
session_start();
if ($_SESSION == null) {
    header("location: login.php");
}
$id_user = $_SESSION["id_user"];
$id_job = $_SESSION["roles_user"];

require('../ConnectionBdd.php');
require "../../template/header.php";
require('../Entity/Client.php');
$id_client = htmlspecialchars($_POST['id_client']);
$array = infoclient($pdo, $id_client);

$infoc = $array[0];
$reportclient = $array[1];
$infoclient = $array[2];
require('../../template/template_info_client.php');
