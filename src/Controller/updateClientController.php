<?php
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
} else {

    require('../ConnectionBdd.php');
    require('../../template/updateClient.php');
    if (isset($_POST['UPDATE_CLIENT'])) {
        $id_client = $_POST['id'];
        $pc = $_POST['pc'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $label = $_POST['label'];

        require('../Entity/Client.php');
        updateclient($id_client, $pc, $city, $address, $phone, $label, $pdo);
    }
}
