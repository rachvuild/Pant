<?php

include('../src/ConnectionBdd.php');
$login = $_POST['login'];
$req = "SELECT u.pwd_user FROM `user` as u WHERE u.id_user = ?";
$req = $pdo->prepare($req);
$req->execute([$login]);
$donnee = $req->fetchAll();
$passowrd = ["password" => $donnee[0]['pwd_user']];
$json = json_encode($passowrd);
// var_dump($json);
echo $json;
$dejson = json_decode($json);
// var_dump($dejson->password);
