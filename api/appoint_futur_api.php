<?php

include('../src/ConnectionBdd.php');
$id_user=$_POST['id_user'];

//$id_user="c.omputer";

//date of the days
$years = date('Y');
$month = date('m');
$day = date('d');
$date = $day . "-" . $month . "-" . $years;
//print all future appointments of the user
$futur = $pdo->prepare("SELECT DISTINCT date_appoint, hour_appoint, nom_client, prenom_client, label_client, client.id_client FROM appointment
INNER JOIN client ON appointment.id_client=client.id_client
WHERE id_user=? AND date_appoint>$date");
try{
    $futur->execute(array("$id_user"));

    $data = $futur->fetchAll(PDO::FETCH_ASSOC);
    $count = count($data);

    if (!empty($data)) {
        echo json_encode(["status" => 200, "message" => "Success", "count" => $count, "data" => $data]);
    } else {

        echo json_encode(["status" => 400, "message" => "Error data base"]);
    }
}catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


