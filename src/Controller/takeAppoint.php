<?php
session_start();
$id_user=$_SESSION["id_user"];
require('../ConnectionBdd.php');
$pdo=ConnexionBdd();
require "../../template/Appointment.php";
require "../Entity/Appointment.php";
