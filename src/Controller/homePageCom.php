

<?php

session_start();
if ($_SESSION == null) {
    header("location: login.php");
}
$id_user = $_SESSION["id_user"];
$id_job = $_SESSION["roles_user"];
include_once('../ConnectionBdd.php');
require('../Entity/entity_homepage.php');
require "../Entity/Appointment.php";
require "../Entity/client.php";
require('../../template/home_page_template.php');

?>