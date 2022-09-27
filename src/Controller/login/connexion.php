<?php
require('connexionbdd.php');

session_start();
$_SESSION['role'] = 'user';
unset($_SESSION['role']);


$id_user = $_POST['id_user'];
$pwd_user = $_POST['pwd_user'];


// function connection($id_user, $pwd_user, $pdo)
// {
// $pwd_user = hash($id_user, $pwd_user);
$connection_user = "SELECT * FROM `user` WHERE id_user ='$id_user' AND pwd_user ='$pwd_user'";
$connection_user = $pdo->prepare($connection_user);
$connection_user->execute();
$recipes = $connection_user->fetchAll();
// var_dump($recipes);
if ($recipes != null) {
    echo "pol";
} else {
}
// }
// function role($id_user, $pwd_user, $pdo)
// {
// $pwd_user = hash($id_user, $pwd_user);
$roles_user = "SELECT * FROM `user` WHERE id_user ='$id_user' AND pwd_user ='$pwd_user'";
$roles_user = $pdo->prepare($roles_user);
$roles_user->execute();
$recipes = $roles_user->fetchAll();

$roles_user = $recipes[0][0];
// }
// var_dump($roles_user);

if ($roles_user == 1) {
    return $this->render('commercial.html',);
    echo "polop";
} elseif ($roles_user == 2) {
    return $this->render('manager.html',);
} elseif ($roles_user == 3) {
    return $this->render('manager.html',);
}
