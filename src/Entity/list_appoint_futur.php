<?php

//date of the day
$years=date('Y');
$month=date('m');
$day=date('d');
$date=$years."-".$month."-".$day;

//print all futur appointment of the user
$futurdate="SELECT date_appoint, hour_appoint, id_client FROM `appointment` WHERE id_user='a.dochez' AND date_appoint>'$date'";
$futur = $pdo->prepare($futurdate);