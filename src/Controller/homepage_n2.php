<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home_page</title>
    <link rel="stylesheet" href="../../assert/style.css">
</head>

<?php
session_start();
$id_user = $_SESSION["id_user"];
$id_job = $_SESSION["roles_user"];
if ($id_job == 3) {
    include_once('../ConnectionBdd.php');

    require('../Entity/list_n_2.php');
    echo '
    <body class="bodyCom">
        <div class="header ">';
    require "../../template/header.php";
    echo '</div>
    <div>';
    require('../../template/display_n_2.php');
    echo '</div>

    </body>

    </html>';
} else {
    echo "<script>alert('Vous n'avez pas les droits');
        document.location.href='homePageCom.php';
        </script>";
}
