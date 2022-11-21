<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hmm</title>
    <link rel="stylesheet" href="../../assert/style.css">
</head>


<body class="bodyCom">

    <div class="header">
        <?php
        session_start();
        $id_user = $_SESSION["id_user"];
        $id_job = $_SESSION["roles_user"];
        include_once('../ConnectionBdd.php');
        $pdo = ConnexionBdd();
        require('../Entity/entity_homepage.php');
        require "../../template/header.php";
        ?>
    </div>
    <div class="parent">
        <div class="PriseRDV">

            <?php
            require "../../template/Appointment.php";
            require "../Entity/Appointment.php";
            require "../../template/registerClient.php";


            ?>
        </div>
        <div class="conterondu">
            <?php
            // require "../Entity/list_appoint_past.php";
            require '../../template/display_appoint_past.php';
            ?>
        </div>
        <div class="RdvEnCour">
            <?php
            // require "../Entity/list_appoint_futur.php";
            require '../../template/display_appoint_futur.php';
            ?>
        </div>



    </div>

</body>

</html>