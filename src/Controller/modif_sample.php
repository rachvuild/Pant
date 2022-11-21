
<?php
session_start();
if ($_SESSION == null) {
    header("location: login.php");
}
else{
    $id_user = $_SESSION["id_user"];
    $id_job = $_SESSION["roles_user"];
    if($id_job==3){
        require('../ConnectionBdd.php');
        $pdo=ConnexionBdd();
        require('../Entity/modif_sample.php');
        require('../../template/header.php');
        require('../../template/insert_sample.php');
        require('../../template/delete_sample.php'); 
        require('../../template/update_sample.php');
    }
    else{
        header("location: homePageCom.php");
    }  
}