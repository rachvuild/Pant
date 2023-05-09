<?php

include('../src/ConnectionBdd.php');
$id_user=$_POST['id_user'];

// find department of the user
$dep = "SELECT id_dep FROM `user` WHERE id_user='$id_user'";
$reponse = $pdo->query($dep);
while ($department = $reponse->fetch()) {
    $d = $department['id_dep'];
    $reponse->closeCursor();
}

// display team of the user
$list = $pdo->prepare("SELECT mail_user, name_user, fname_user FROM user WHERE id_dep=? AND id_job=1");
try{
    $list->execute(array("$d"));

    $data = $list->fetchAll(PDO::FETCH_ASSOC);
    $count = count($data);

    if (!empty($data)) {
        echo json_encode(["status" => 200, "message" => "Success", "count" => $count, "data" => $data]);
    } else {

        echo json_encode(["status" => 400, "message" => "Error data base"]);
    }
}catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}