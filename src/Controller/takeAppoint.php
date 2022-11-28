<?php
session_start();
$id_user = $_SESSION["id_user"];
$id_job = $_SESSION["roles_user"];
require('../ConnectionBdd.php');

require('../../template/header.php');
require "../../template/Appointment.php";
require "../Entity/Appointment.php";
