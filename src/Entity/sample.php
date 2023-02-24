<?php
//Fetch all sample
$sample = "SELECT s.id_sample,  s.label_sample FROM donner d
INNER JOIN report r ON r.id_report = d.id_report
LEFT JOIN sample s ON s.id_sample = d.id_sample
WHERE r.id_client = $id_client
GROUP BY s.id_sample";

$sampleall = "SELECT s.id_sample,  s.label_sample FROM sample s";

$sample_req = $pdo->prepare($sample);
$sample_req->execute();
$sampleClient = $sample_req->fetchAll();

$sampleAll_req = $pdo->prepare($sampleall);
$sampleAll_req->execute();
$sampleAll = $sampleAll_req->fetchAll();
$sampleAllvue = [];
// var_dump($sampleAll);
// var_dump($sampleClient);
foreach ($sampleClient as $sampleAllSelect) {
    foreach ($sampleAll as $sampleselect) {
        // echo $sampleAllSelect[0];

        if ($sampleAllSelect[0] != $sampleselect[0]) {
            // array_push($sampleAllvue, $sampleselect);
        }
    }
}
$sampleAllvue = array_unique($sampleAllvue);
var_dump($sampleAllvue);
die;

if ($_SESSION == null) {
    header("location: index.php");
}
