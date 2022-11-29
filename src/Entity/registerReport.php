<?php

$summary = $_POST['summary'];
$interest = $_POST['interest'];
$id_client = $_POST['id_client'];
$id_user = $_POST['id_user'];
$id_appoint = $_POST['id_appoint'];
echo $id_user;

// Register report in database
$registerReport =
    "INSERT INTO `report`(`summary_report`, `interest_report`, `id_client`, `id_user`, `id_appoint`) 
VALUES ('$summary','$interest',$id_client,'$id_user',$id_appoint)";
$registerReport = $pdo->prepare($registerReport);
if ($registerReport->execute()) {
    $reponse = $pdo->query('SELECT `id_report` FROM `report` ORDER BY `id_report` DESC');
    $donnees = $reponse->fetch();
    echo "L'identifiant du report est le suivant" . $donnees['id_report'];
    $id_report = $donnees['id_report'];
}



//Fetch all sample
$sample = "SELECT * FROM `sample`";
$sample_req = $pdo->prepare($sample);
// Register Sample
if ($sample_req->execute()) {
    foreach ($pdo->query($sample) as $ligne) {
        $nbSample = $_POST['' . $ligne[1] . ''];
        echo 'ligne: ' . $ligne[0] . 'id report :' . $id_report . 'nb sample :' . $nbSample . '</br>';
        if (!empty($nbSample)) {
            $nbSample = $_POST['' . $ligne[1] . ''];
            $sampleInsert = "INSERT INTO `donner`(`id_sample`, `id_report`, `nb_sample`) VALUES ($ligne[0],$id_report,$nbSample)";
            $sampleInsert = $pdo->prepare($sampleInsert);
            $sampleInsert->execute();
        }
        "<label for='" . $ligne[1] . "'>nombre donné :</label>
            <input type='number' name='" . $ligne[1] . "' id='" . $ligne[1] . "'><br/>";
    }
}
//redirection 
echo "<script>alert('Compte rendu ajouter!');
        document.location.href='homePageCom.php';
        </script>";
