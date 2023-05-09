<?php

include('../src/ConnectionBdd.php');


$id_client = $_POST['id_client'];
//select informations about client
$infoclient = "SELECT * FROM client WHERE id_client=?";
$infoc = $pdo->prepare($infoclient);

//print all information about client

try{
    $infoc->execute(array("$id_client"));

    $data = $infoc->fetchAll(PDO::FETCH_ASSOC);
    $count = count($data);

    if (!empty($data)) {
        echo json_encode(["status" => 200, "message" => "Success", "count" => $count, "data" => $data]);
    } else {

        echo json_encode(["status" => 400, "message" => "Error data base"]);
    }
}catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}