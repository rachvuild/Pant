
<?php
session_start();
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
} else {
    $id_user = $_SESSION["id_user"];
    $id_job = $_SESSION["roles_user"];
    if ($id_job == 3) {
        include_once('../ConnectionBdd.php');

        require('../Entity/list_n_2.php');
        require "../../template/header.php";
        require('../../template/display_n_2.php');
    } else {
        echo "<script>alert('Vous n'avez pas les droits');
            document.location.href='homePageCom.php';
            </script>";
    }
}
