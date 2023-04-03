<?php

$summary = htmlspecialchars($_POST['summary']);
$interest = htmlspecialchars($_POST['interest']);
$id_client = htmlspecialchars($_POST['id_client']);
$id_user = htmlspecialchars($_POST['id_user']);
$id_appoint = htmlspecialchars($_POST['id_appoint']);
$date = htmlspecialchars($_POST['date']);

if ($date == null) {
    $date = date("Y-m-d H:i:s");
}


// Register report in database
$registerReport =
    "INSERT INTO `report`(`summary_report`, `interest_report`, `id_client`, `id_user`, `id_appoint`) 
        VALUES ('$summary','$interest',$id_client,'$id_user',$id_appoint)";
$registerReport = $pdo->prepare($registerReport);
if ($registerReport->execute()) {
    $reponse = $pdo->query('SELECT `id_report` FROM `report` ORDER BY `id_report` DESC');
    $donnees = $reponse->fetch();
    $id_report = $donnees['id_report'];
    $reportinsert = 1;
}



//Fetch all sample
$sample = "SELECT * FROM `sample`";
$sample_req = $pdo->prepare($sample);
// Register Sample
if ($sample_req->execute()) {
    foreach ($pdo->query($sample) as $ligne) {
        $nbSample = $_POST['' . $ligne[1] . ''];
        if (!empty($nbSample)) {
            $nbSample = $_POST['' . $ligne[1] . ''];
            $sampleInsert = "INSERT INTO `donner`(`id_sample`, `id_report`, `nb_sample`) VALUES ($ligne[0],$id_report,$nbSample)";
            $sampleInsert = $pdo->prepare($sampleInsert);
            if ($sampleInsert->execute()) {
                $samplereport = 1;
            }
        }
        //si il n'y a pas d'échantillon
        else{
            $samplereport=1;
        }
    }
}
if ($samplereport == 1 and $reportinsert = 1) {
    echo "<script>alert('Compte rendu ajouté!');
            document.location.href='homePageCom.php';
            </script>";
}
