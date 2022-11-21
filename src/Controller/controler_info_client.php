<?php
session_start();
if ($_SESSION == null) {
    header("location: login.php");
}

require('../ConnectionBdd.php');
require('../Entity/info_client.php');
require('../../template/template_info_client.php');
