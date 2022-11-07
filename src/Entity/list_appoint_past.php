<?php

//date of the day
$years=date('Y');
$month=date('m');
$day=date('d');
$date=$years."-".$month."-".$day;
// print all past appointment of the user
$pastdate="SELECT date_appoint, hour_appoint, id_appoint, id_user, id_client FROM `appointment` WHERE id_user='$id_user' AND date_appoint<'$date'";
$past = $pdo->prepare($pastdate);

