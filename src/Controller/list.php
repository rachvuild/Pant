<?php

session_start();
$id_job = $_SESSION["roles_user"];
$id_user=$_SESSION["id_user"];
require('../ConnectionBdd.php');
$pdo=ConnexionBdd();
require('../Entity/list_n_1.php');
require('../../template/display_n_1.php');