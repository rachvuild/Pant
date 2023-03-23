<?php

$id = $_POST['id_client'];
//select informations about client
$infoclient = "SELECT * FROM client WHERE id_client=$id";
$infoc = $pdo->prepare($infoclient);

//all reports with this client
$reportclient = $pdo->query("SELECT summary_report, interest_report, report.id_user, appointment.date_appoint FROM `report`, appointment WHERE report.id_client=$id AND report.id_appoint=appointment.id_appoint");
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
}
