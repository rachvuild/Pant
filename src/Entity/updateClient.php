<?php
// Connection to database
require('../ConnectionBdd.php');
$pdo = ConnexionBdd();

// Get data from registerClient.html form
$id_client = $_POST['id'];
$pc = $_POST['pc'];
$city = $_POST['city'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$label = $_POST['label'];
$comment = $_POST['comment'];
$submit = $_POST['Envoyer'];

if (isset($_POST['Envoyer'])){
    $update_client = "UPDATE `client` SET";
    if (!empty($pc)){
        $update_client = $update_client . "pc_client =" . $pc;
    };
    if (!empty($city)){
        $update_client = $update_client . "city_client =". $city;
    }
    if (!empty($address)){
        $update_client = $update_client . "address_client =". $address;
    }
    if(!empty($phone)){
        $update_client = $update_client . "phone_client =". $phone;
    }
    if(!empty($label)){
        $update_client = $update_client . "phone_client =". $label;
    }
    if(!empty($comment)){
        $update_client = $update_client . "phone_client =". $comment;
    }
    $update_client = substr($update_client,0,-1)." WHERE id_client=".$id_client;
    echo $update_client;
    $update_client=$pdo->prepare($update_client);
    if ($update_client->execute()) {
        echo "Modification réussie";
    }
    else {
        echo "Modification foireuse";
    }

}

