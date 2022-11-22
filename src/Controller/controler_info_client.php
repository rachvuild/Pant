<?php
session_start();
if ($_SESSION == null) {
    header("location: login.php");
}

require('../ConnectionBdd.php');
require('../Entity/Client.php');
$id_client = htmlspecialchars($_POST['id_client']);
$array = infoclient($pdo, $id_client);

$infoc = $array[0];
$reportclient = $array[1];
$infoclient = $array[2];
require('../../template/template_info_client.php');
