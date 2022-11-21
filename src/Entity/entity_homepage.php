<?php
$tab = [];
//date of the day
$years = date('Y');
$month = date('m');
$day = date('d');
$dater = $years . "-" . $month . "-" . $day;

//print all futur appointment of the user
$futurdate = "SELECT DISTINCT date_appoint FROM `appointment` WHERE id_user='$id_user' AND date_appoint>'$dater' ORDER BY date_appoint";
$futur = $pdo->prepare($futurdate);

function Days($dates, $id_user, $pdo)
{
    $futurday = "SELECT hour_appoint, appointment.id_client, label_client, nom_client, prenom_client FROM `appointment`, client WHERE id_user='$id_user' AND date_appoint='$dates' AND client.id_client=appointment.id_client ORDER BY hour_appoint";
    $futurd = $pdo->query($futurday);
    return $futurd;
}

// print all past appointment of the user
$pastdate = "SELECT DISTINCT appointment.date_appoint FROM `appointment`
LEFT JOIN report USING(id_appoint) WHERE report.id_appoint IS NULL AND appointment.id_user='$id_user'  AND appointment.date_appoint<'$dater'  ORDER BY date_appoint DESC";
$past = $pdo->prepare($pastdate);

function Dayspast($dates, $id_user, $pdo)
{
    $pastday = "SELECT DISTINCT appointment.date_appoint, appointment.hour_appoint, appointment.id_appoint, appointment.id_user, appointment.id_client, label_client,  nom_client, prenom_client FROM `appointment`
    LEFT JOIN client ON client.id_client=appointment.id_client
    LEFT JOIN report USING(id_appoint) WHERE report.id_appoint IS NULL
    AND appointment.id_user='$id_user' AND appointment.date_appoint='$dates'";
    $pastd = $pdo->query($pastday);
    return $pastd;
}

// verifie if a report was effected

function Verif($id, $pdo)
{
    $verif = $pdo->prepare("SELECT * FROM `report` WHERE id_appoint=$id");
    $verif->execute();
    if ($verif->rowCount() == 1) {
        $v = "exist";
    } else {
        $v = "no";
    }
    return $v;
}
