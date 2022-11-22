<?php
// Connection to database
include_once('../ConnectionBdd.php');


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
        if ($date != NULL && $timestamp != NULL && $idClient != NULL) {


            $timestamp = date('H:i:s', mktime($timestamp, 0, 0));
            $test = $pdo->prepare("SELECT `hour_appoint`, `date_appoint` FROM `appointment` WHERE `id_user` = '$id_user' AND `hour_appoint` = '$timestamp' AND `date_appoint`='$date'");
            $test->execute();
            $testAppoint = $test->fetch();

            if (empty($testAppoint)) {

                $rdv = "INSERT INTO `appointment` (`id_appoint`, `date_appoint`, `hour_appoint`, `id_user`, `id_client`) VALUES (NULL, '$date', '$timestamp', '$id_user', '$idClient'); ";
                $newAppoint = $pdo->prepare($rdv);
                $newAppoint->execute();
                echo "<script > 
                
                alert('rdv ajouté'); 
                document.location.href='../Controller/HomePageCom.php';
                </script>";
            } else {

                echo "
                <script > 
                
                alert('Plage déjà utilisé'); 
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
    } else echo "
    <script> 
    
    alert('Client déjà Existant'); 
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
