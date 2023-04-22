<?php

include('../src/ConnectionBdd.php');
$id_user = $_POST['id_user'];
$req = "SELECT report.id_report, summary_report, interest_report, comments, comments.id_user, date_appoint, report.id_client  
FROM `report`, comments, appointment 
WHERE report.id_report=comments.id_report 
AND report.id_user='$id_user' 
AND report.id_appoint=appointment.id_appoint";
$req = $pdo->prepare($req);
$req->execute();
$donnee = $req->fetchAll(PDO::FETCH_ASSOC);

//$passowrd = ["password" => $donnee[0]['pwd_user']];
//$json = json_encode($passowrd);
// var_dump($json);
//echo $json;
//$dejson = json_decode($json);
// var_dump($dejson->password);

if (!empty($donnee)){
    echo json_encode(["status" => 200, "message" => "success", "data" => $donnee]);
}else{
    echo json_encode(["status" => 400, "message" => "failed"]);
}
