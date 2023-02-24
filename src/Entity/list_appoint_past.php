<?php

//date of the day
$years = date('Y');
$month = date('m');
$day = date('d');
$date = $years . "-" . $month . "-" . $day;
// print all past appointment of the user
$pastdate = "SELECT DISTINCT date_appoint FROM `appointment` WHERE id_user='$id_user' AND date_appoint<'$date'";
$past = $pdo->prepare($pastdate);

function Dayspast($dates, $id_user, $pdo)
{
    $pastday = "SELECT date_appoint, hour_appoint, id_appoint, id_user, appointment.id_client, label_client FROM `appointment`, client WHERE id_user='$id_user' AND date_appoint='$dates' AND client.id_client=appointment.id_client";
    $pastd = $pdo->query($pastday);
    return $pastd;
}
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
}
