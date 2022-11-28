<?php
session_start();

if ($_SESSION == null) {
    header("location: login.php");
}
else{
    $id_user = $_SESSION["id_user"];
    $id_job = $_SESSION["roles_user"];
    if($id_job==2){
        require('../ConnectionBdd.php');

        require "../Entity/Appointment.php";
        require('../Entity/entity_homepage.php');

        require('../../template/header.php');
        require "../../template/Appointment.php";
        
    }
}
