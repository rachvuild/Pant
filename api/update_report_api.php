<?php

include('../src/ConnectionBdd.php');
$summary = $_POST['summary'];
$interest = $_POST['interest'];
$id_report = $_POST['id_report'];

$update_report = "UPDATE report SET ";
if (!empty($summary)) {
    $update_report = $update_report . "summary_report= '" . $summary . "',";
}
if (!empty($interest)) {
    $update_report = $update_report . "interest_report= '" . $interest . "',";
}
$update_report = substr($update_report, 0, -1) . " WHERE id_report=" . $id_report;
echo $update_report;
$update_report = $pdo->prepare($update_report);
$update_report->execute();
$donnee = $update_report->fetchAll(PDO::FETCH_ASSOC);


if (!empty($donnee)){
    echo json_encode(["status" => 200, "message" => "success", "data" => $donnee]);
}else{
    echo json_encode(["status" => 400, "message" => "failed"]);
}