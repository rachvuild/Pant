<?php

session_start();
$id_user=$_SESSION['id_user'];
$id_job = $_SESSION["roles_user"];
require('../ConnectionBdd.php');
$pdo=ConnexionBdd();
$id_job=1;
require('../Entity/report_entity.php');
require('../../template/report_template.php');