<?php

include('../src/ConnectionBdd.php');
$id_user=$_POST['id_user'];

//$id_user="c.omputer";

//date of the days
$years = date('Y');
$month = date('m');
$day = date('d');
$date = $day . "-" . $month . "-" . $years;
//print all past appointments of the user
$past = $pdo->prepare("SELECT DISTINCT appointment.date_appoint, appointment.hour_appoint, appointment.id_appoint, appointment.id_client, label_client,  nom_client, prenom_client FROM appointment
LEFT JOIN client ON client.id_client=appointment.id_client
LEFT JOIN report USING(id_appoint) WHERE report.id_appoint IS NULL
AND appointment.id_user=? AND appointment.date_appoint>$date
ORDER BY appointment.date_appoint");
try{
    $past->execute(array("$id_user"));

    $data = $past->fetchAll(PDO::FETCH_ASSOC);
    $count = count($data);

    if (!empty($data)) {
        echo json_encode(["status" => 200, "message" => "Success", "count" => $count, "data" => $data]);
    } else {

        echo json_encode(["status" => 400, "message" => "Error data base"]);
    }
}catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}