<?php
session_start();
$id_user = $_SESSION["id_user"];
require('../ConnectionBdd.php');

require "../../template/Appointment.php";
require "../Entity/Appointment.php";
