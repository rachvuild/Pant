<?php
//print n+1
$n1 = "SELECT DISTINCT user.id_dep, id_user,`mail_user`,`name_user`,`fname_user`, label_dep FROM `user`, department WHERE id_job=2 AND user.id_dep=department.id_dep";
$n1 = $pdo->prepare($n1);
$n1->execute();

//print id_region of user

$user = "SELECT * FROM `user` WHERE id_user ='$id_user'";
$user = $pdo->prepare($user);
$user->execute();
$user = $user->fetchAll();
// echo "pol";
$departement = $user[0]["id_dep"];
$departement = "SELECT * FROM `department` WHERE `id_dep` = '$departement'";
$departement = $pdo->prepare($departement);
$departement->execute();
$departement = $departement->fetchAll();


$region = $departement[0]["id_region"];
$AllDepartement = "SELECT * FROM `department` WHERE `id_region` = '$region'";
$AllDepartement = $pdo->prepare($AllDepartement);
$AllDepartement->execute();
$AllDepartement = $AllDepartement->fetchAll();
foreach ($AllDepartement as $ligne) {
    $id = $ligne['id_dep'];
    $user = "SELECT user.id_dep, id_user,`mail_user`,`name_user`,`fname_user`, label_dep FROM `user`, department WHERE user.id_dep=department.id_dep AND user.id_dep=$id AND user.id_job=1";
    $user = $pdo->prepare($user);
    $user->execute();
    $alluser[$id] = $user->fetchAll();
}
if ($_SESSION == null) {
    header("location: index.php");
}
