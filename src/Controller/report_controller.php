<?php
require('../ConnectionBdd.php');
$pdo=ConnexionBdd();
$id_job=1;
require('../Entity/report_entity.php');
require('../../template/report_template.php');