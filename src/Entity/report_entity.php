<?php
if(isset($_POST['compte_rendu'])){
    $id_user=$_POST['id_user'];

    //print necessary information about report that validate
    $inforeport=$pdo->query("SELECT summary_report, interest_report, comments, comments.id_user, date_appoint, report.id_client  FROM `report`, comments, appointment WHERE report.id_report=comments.id_report AND report.id_user='$id_user' AND report.id_appoint=appointment.id_appoint");

    //print necessary information about report no validate
    $inforeportno=$pdo->query("SELECT DISTINCT summary_report, interest_report, appointment.date_appoint, report.id_client, report.id_report FROM `report`
    LEFT JOIN appointment ON appointment.id_appoint=report.id_appoint
    LEFT JOIN comments USING(id_report) WHERE comments.id_report IS NULL
    AND report.id_user='$id_user'");
}
else{

    //print necessary information about report that validate
    $inforeport=$pdo->query("SELECT summary_report, interest_report, comments, comments.id_user, appointment.date_appoint, report.id_client  FROM `report`, comments, appointment WHERE report.id_report=comments.id_report AND report.id_user='$id_user' AND report.id_appoint=appointment.id_appoint");

    //print necessary information about report no validate
    $inforeportno=$pdo->query("SELECT DISTINCT summary_report, interest_report, appointment.date_appoint, report.id_client, report.id_report FROM `report`
    LEFT JOIN appointment ON appointment.id_appoint=report.id_appoint
    LEFT JOIN comments USING(id_report) WHERE comments.id_report IS NULL
    AND report.id_user='$id_user'");
}
