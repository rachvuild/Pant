<?php
require('../ConnectionBdd.php');
$pdo=ConnexionBdd();
require('../Entity/modif_sample.php');
require('../../template/insert_sample.php');
require('../../template/delete_sample.php'); 
require('../../template/update_sample.php');