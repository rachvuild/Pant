<?php

require('../ConnectionBdd.php');
$pdo=ConnexionBdd();
$id_report=$_POST['id_report'];
require('../../template/update_report_template.php');