<?php
$id_user=$_POST['id_user'];
require('../ConnectionBdd.php');
$pdo=ConnexionBdd();
require('../Entity/list_report.php');
require('../../template/display_report.php');