<?php
include('../connection/vertif.php');
$token = $_POST["token"];
$idUser = htmlspecialchars($_POST["id_user"]);
if (!empty($token) or !empty($idUser)) {
    include('../../src/ConnectionBdd.php');

    $verif = verifTok($token, $pdo);

    if ($verif === 1) {

        $req = $pdo->prepare("SELECT DISTINCT  * FROM `appointment` AS a INNER JOIN client AS c ON c.id_client = a.id_client WHERE a.id_user='$idUser' GROUP BY a.id_client ");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $count = count($data);

        if (!empty($data)) {
            echo json_encode(["status" => 200, "message" => "Success", "count" => $count, "data" => $data]);
        } else {

            echo json_encode(["status" => 400, "message" => "Error data base"]);
        }
    } else {
        echo json_encode(["status" => 400, "message" => "Error"]);
    }
} else {
    echo json_encode(["status" => 400, "message" => "pol"]);
}
