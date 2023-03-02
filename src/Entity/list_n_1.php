<?php
// found department of user
$dep = "SELECT id_dep FROM `user` WHERE id_user='$id_user'";
$reponse = $pdo->query($dep);
while ($department = $reponse->fetch()) {
    $d = $department['id_dep'];
    $reponse->closeCursor();
}
// display team of user
$request = "SELECT mail_user, name_user, fname_user, id_user FROM `user` WHERE id_dep=$d AND id_job=1;";
$req = $pdo->prepare($request);
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
}
