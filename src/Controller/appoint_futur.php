<?php
session_start();
$id_user=$_SESSION["id_user"];
require('../ConnectionBdd.php');
$pdo=ConnexionBdd();
require('../Entity/list_appoint_futur.php');
require('../../template/display_appoint_futur.php');