<?php

if (isset($_POST['UPDATE_REPORT'])) {
    $summary = $_POST['summary'];
    $interest = $_POST['interest'];
    $id_report= $_POST['id_report'];
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
    if($update_report->execute()){
        echo "<script>alert('Compte rendu modifier!');
        document.location.href='../Controller/report_controller.php';
        </script>";
    }
}
if(isset($_POST['modif'])){
    //take label_report
    $id_report = $_POST['id_report'];
    $label=$pdo->prepare("SELECT summary_report FROM report WHERE id_report=?");
    $label->execute(array($id_report));
}