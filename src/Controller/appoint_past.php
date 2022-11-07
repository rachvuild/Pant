<?php
require('../ConnectionBdd.php');
$pdo=ConnexionBdd();
require('../Entity/list_appoint_past.php');
require('../../template/display_appoint_past.php');