<?php
session_start();
// $id_user = $_SESSION["id_user"];
$id_user = "a.dochez";
require('../ConnectionBdd.php');
$pdo = ConnexionBdd();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assert/style.css">
</head>

<body>
    <div class="parent">

        <div class="PriseRDV">
            <?php

            require "../../template/Appointment.php";
            require "../Entity/Appointment.php";

            ?>
        </div>
        <div class="conterondu">
            <?php
            require('../Entity/list_appoint_past.php');
            require('../../template/display_appoint_past.php');
            ?>
        </div>
        <div class="RdvEnCour">
            <?php
            require('../Entity/list_appoint_futur.php');
            require('../../template/display_appoint_futur.php');
            ?>
        </div>



    </div>

</body>

</html>