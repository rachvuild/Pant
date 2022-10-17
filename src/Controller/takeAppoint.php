<?php
require('../ConnectionBdd.php');
$pdo=ConnexionBdd();
$id_user = $_POST['id_user'];
require "../../template/Appointment.php";
$id_user = $_POST['id_user'];

require "../Entity/Appointment.php";
