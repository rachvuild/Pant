<?php

session_start();
$id_user=$_SESSION["id_user"];
require('../ConnectionBdd.php');
$pdo=ConnexionBdd();
require('../Entity/create_com_entity.php');
require('../../template/create_com_template.php');