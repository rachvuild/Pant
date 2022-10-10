
<?php
// select all report with good id_user
$request="SELECT date_appoint, hour_appoint, id_report FROM report, appointment WHERE report.id_user='$id_user' AND appointment.id_appoint=report.id_appoint";
$req = $pdo->prepare($request);