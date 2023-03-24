<?php
// Connection to database
include_once('../ConnectionBdd.php');
include_once('Appointment.php');


// ==================================================================================================================================================
// Register Client
function registerClient($pc, $city, $address, $phone, $label, $nom, $prenom, $email, $timestamp, $date, $id_user, $pdo)
{

    $requete = $pdo->prepare("SELECT label_client, email_client FROM client WHERE label_client='$label' AND email_client = '$email'");
    $requete->execute();
    $requete->fetch();

    // Insert data in client table
    if ($requete->rowCount() == 0) {
        $register_clients = "INSERT INTO `client`(`pc_client`, `city_client`, `address_client`, `phone_client`, `label_client`, `nom_client`, `prenom_client`, `email_client`)
        VALUES ('$pc','$city','$address','$phone','$label','$nom','$prenom','$email')";

        $register_clients = $pdo->prepare($register_clients);
        $register_clients->execute();
        $client = "SELECT * FROM `client` WHERE label_client ='$label' AND nom_client ='$nom'AND prenom_client ='$prenom'AND email_client ='$email'";
        $client = $pdo->prepare($client);
        $client->execute();
        $client = $client->fetchAll();
        $idClient = $client[0]['id_client'];
        appointement($date,$timestamp,$idClient,$id_user,$pdo);
      
    } else echo "
    <script> 
    
    alert('Client déjà Existant'); 
    document.location.href='../Controller/HomePageCom.php';
    </script>
    ";
}


// ==================================================================================================================================================
// Update Client
function updateclient($id_client, $pc, $city, $address, $phone, $label, $pdo)
{

    $update_client = "UPDATE client SET ";
    if (!empty($pc)) {
        $update_client = $update_client . "pc_client= '" . $pc . "',";
    }
    if (!empty($city)) {
        $update_client = $update_client . "city_client= '" . $city . "',";
    }
    if (!empty($age)) {
        $update_client = $update_client . "address_client= " . $address . ",";
    }
    if (!empty($mail)) {
        $update_client = $update_client . "phone_client= '" . $phone . "',";
    }
    if (!empty($tel)) {
        $update_client = $update_client . "label_client= '" . $label . "',";
    }
    $update_client = substr($update_client, 0, -1) . " WHERE id_client=" . $id_client;
    echo $update_client;
    $update_client = $pdo->prepare($update_client);
    $update_client->execute();
}
function infoclient($pdo, $id_client)
{


    //select information about client
    $infoclient = "SELECT * FROM client WHERE id_client=$id_client";
    $infoc = $pdo->prepare($infoclient);

    //all report with this client
    $reportclient = $pdo->query("SELECT  summary_report, interest_report, report.id_user, appointment.date_appoint ,report.id_report,report.id_client FROM `report`, appointment WHERE report.id_client=23 AND report.id_appoint=appointment.id_appoint");

    $array = array($infoc, $reportclient, $infoclient);
    return $array;
}
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
}
