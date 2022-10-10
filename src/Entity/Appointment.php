<?php
require "../ConnectionBdd.php";
$db = ConnexionBdd();

$date = $_POST['date'];
$plageHoraire = $_POST['horaire'];
$idClient = $_POST['client'];

echo "$date $plageHoraire $idClient";

$rdv = "INSERT INTO `appointment`(`date_appoint`, `hour_appoint`, `id_user`, `id_client`) VALUES ('[$date]','[$plageHoraire]','[$idClient]','[p.boyer]')";
$newAppoint = $db->prepare($rdv);
$newAppoint -> execute();
