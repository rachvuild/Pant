<?php
// Connection to database
include_once('../ConnectionBdd.php');
$pdo = ConnexionBdd();
session_start();
$id_user  = $_SESSION["id_user"];
// ==================================================================================================================================================
// Register Client
if (isset($_POST['REGISTER_CLIENT'])) {
    $pc = $_POST['pc'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $label = $_POST['label'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $timestamp = $_POST['horaire'];
    $date = $_POST['date'];
    // Insert data in client table
    $register_clients = "INSERT INTO `client`(`pc_client`, `city_client`, `address_client`, `phone_client`, `label_client`, `nom_client`, `prenom_client`, `email_client`)
VALUES ('$pc','$city','$address','$phone','$label','$nom','$prenom','$email')";

    $register_clients = $pdo->prepare($register_clients);
    $register_clients->execute();
    $client = "SELECT * FROM `client` WHERE label_client ='$label' AND nom_client ='$nom'AND prenom_client ='$prenom'AND email_client ='$email'";
    $client = $pdo->prepare($client);
    $client->execute();
    $client = $client->fetchAll();
    $idClient = $client[0]['id_client'];
    if ($date != NULL && $timestamp != NULL && $idClient != NULL) {


        $test = $pdo->prepare("SELECT `date_appoint`, `hour_appoint` FROM `appointment` WHERE `id_user` = '$id_user' ");
        $test->execute();
        $testAppoint = $test->fetchAll();
        if ($timestamp = 'matin') $timestamp = date('H:i:s', mktime(8, 0, 0));
        else $timestamp = date('H:i:s', mktime(14, 0, 0));


        if (array_search($date, $testAppoint) == NULL && array_search($timestamp, $testAppoint) == NULL) {

            $rdv = "INSERT INTO `appointment` (`id_appoint`, `date_appoint`, `hour_appoint`, `id_user`, `id_client`) VALUES (NULL, '$date', '$timestamp', '$id_user', '$idClient'); ";
            $newAppoint = $pdo->prepare($rdv);
            $newAppoint->execute();
            echo "<script > 
            
            alert('rdv ajouté'; 
            document.location.href='../Controller/HomePageCom.php';
            </script>";
        } else {

            echo "
            <script > 
           
            alert('Plage déjà utilisé'; 
            document.location.href='../Controller/HomePageCom.php';
            </script>
            ";
        }
    } else echo "
    <script> 
         
            alert('Veuillez remplir tous les champs'); 
            document.location.href='../Controller/HomePageCom.php';
            </script>
    ";
}

// ==================================================================================================================================================
// Update Client

if (isset($_POST['UPDATE_CLIENT'])) {
    $id_client = $_POST['id'];
    $pc = $_POST['pc'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $label = $_POST['label'];
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
