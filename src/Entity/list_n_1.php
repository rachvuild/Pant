<?php
// found department of user
$dep="SELECT id_dep FROM `user` WHERE id_user='a.dochez'";
$reponse = $pdo->query($dep);
while ($department = $reponse->fetch()){
    $d=$department['id_dep'];
$reponse->closeCursor();}
// display team of user
$request="SELECT mail_user, name_user, fname_user, id_user FROM `user` WHERE id_dep=$d;";
$req = $pdo->prepare($request);