<?php
require "../ConnectionBdd.php";
$db = ConnexionBdd();

$date = $_POST['date'];
$timestamp = $_POST['horaire'];
$idClient = $_POST['client'];

echo "$date $timestamp $idClient";

$test = $db -> prepare("SELECT `date_appoint`, `hour_appoint` FROM `appointment` WHERE `id_user` = 't.letoublon' ");
$test -> execute();
$testAppoint = $test -> fetchAll();

print_r($testAppoint);

$testRech = array_search($date, $testAppoint);
echo '<br/>'.$testRech;

if (array_search($date, $testAppoint)!=NULL && array_search($timestamp, $testAppoint)!=NULL) {
    $rdv = "INSERT INTO `appointment` (`id_appoint`, `date_appoint`, `hour_appoint`, `id_user`, `id_client`) VALUES (NULL, '$date', '$timestamp', 't.letoublon', '$idClient'); ";
    $newAppoint = $db->prepare($rdv);
    $newAppoint -> execute();
}
else {
    echo "Plage déjà utilisé";
}


