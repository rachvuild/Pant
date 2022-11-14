<?php

$tab=[];
//date of the day
$years=date('Y');
$month=date('m');
$day=date('d');
$dater=$years."-".$month."-".$day;

//print all futur appointment of the user
$futurdate="SELECT DISTINCT date_appoint FROM `appointment` WHERE id_user='$id_user' AND date_appoint>'$dater'";
$futur = $pdo->prepare($futurdate);

function Days($dates, $id_user, $pdo){
    $futurday="SELECT hour_appoint, appointment.id_client, label_client FROM `appointment`, client WHERE id_user='$id_user' AND date_appoint='$dates' AND client.id_client=appointment.id_client";
    $futurd=$pdo->query($futurday);
    return $futurd;
}

// print all past appointment of the user
$pastdate="SELECT DISTINCT date_appoint FROM `appointment` WHERE id_user='$id_user' AND date_appoint<'$dater'";
$past = $pdo->prepare($pastdate);

function Dayspast($dates, $id_user, $pdo){
    $pastday="SELECT date_appoint, hour_appoint, id_appoint, id_user, appointment.id_client, label_client FROM `appointment`, client WHERE id_user='$id_user' AND date_appoint='$dates' AND client.id_client=appointment.id_client";
    $pastd=$pdo->query($pastday);
    return $pastd;
}

