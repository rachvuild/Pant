<?php
//require('../ConnectionBdd.php');
//$pdo=ConnexionBdd();
//SELECT id_user, mail_user, name_user, fname_user FROM `user` WHERE id_dep=69;

$dep="SELECT id_dep FROM `user` WHERE id_user='t.letoublon'";
$reponse = $pdo->query($dep);
while ($department = $reponse->fetch()){
    $d=$department['id_dep'];
$reponse->closeCursor();}

$request="SELECT id_user, mail_user, name_user, fname_user FROM `user` WHERE id_dep=69;";
$req = $pdo->prepare($request);