<?php
// Connection to database
require('../ConnectionBdd.php');
$pdo = ConnexionBdd();

// Get data from registerClient.html
$pc = $_POST['pc'];
$city = $_POST['city'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$label = $_POST['label'];
$modif=$_POST["action"];

switch ($modif) {
    // Insert data in client table
    case 'Créer':
        $register_client = "INSERT INTO `client`(`id_client`, `pc_client`, `city_client`, `address_client`, `phone_client`, `label_client`, `comment_client`)
        VALUES ('','$pc','$city','$address','$phone','$label','')";
        $register_client=$pdo->prepare($register_client);
        if ($register_client->execute()) {
            echo "Création réussie";
        }
        else {
            echo "Création foireuse";
        }
     break;
     //Modify data in client table
    case 'Modifier':
        $modify_compte = "UPDATE client SET ";
        if (!empty ($pc))
        {
            $modify_compte = $modify_compte."pc_client = '".$pc."',";
        }
        if (!empty ($city))
        {
            $modify_compte = $modify_compte."city_client = '".$city."',";
        }
        if (!empty ($address))
        {
            $modify_compte = $modify_compte."address_client = ".$address.",";
        }
        if (!empty ($phone))
        {
            $modify_compte = $modify_compte."phone_client = '".$phone."',";
        }
        if (!empty ($label))
        {
            $modify_compte = $modify_compte."label_client = '".$label."',";
        }
        if (!empty ($comment))
        {
            $modify_compte = $modify_compte."comment_client= '".$comment."',";
        }
        $modify_compte = substr($modify_compte,0,-1)." WHERE id_client=".$id_client;
        echo $modify_compte;
        $modify_compte=$pdo->prepare($modify_compte);
        if ($modify_compte->execute()) {
            echo "Modification réussie";
        }
        else {
            echo "Modification foireuse";
        }
    break;
    case 'Supprimer' :
        $delete_compte="DELETE FROM client WHERE id_client=$id_client";
        $delete_compte=$pdo->prepare($delete_compte);
        if ($delete_compte->execute()) {
            echo "Suppression réussie";
        }
        else {
            echo "Suppression échouée";
        }
    break;
}