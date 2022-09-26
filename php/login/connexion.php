<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
echo ("Connexion réussi</br>");


$id_user = $_POST['id_user'];
$pwd_user = $_POST['pwd_user'];


function connexion($id_user, $pwd_user, $pdo)
{
    $pwd = hash($id_user, $pwd_user);
    $connexion_user = "SELECT * FROM `user` WHERE id_user ='$id_user' AND pwd_user ='$pwd'";
    $connexion_user = $pdo->prepare($connexion_user);
    if ($connexion_user != null) {
    } else {
    }
}
function role($id_user, $pwd_user, $pdo)
{
    $pwd = hash($id_user, $pwd_user);
    $roles_user = "SELECT * FROM `user` WHERE id_user ='$id_user' AND pwd_user ='$pwd'";
    $roles_user = $pdo->prepare($roles_user);
    $roles_user = $roles_user[1][2];
}



return $this->render('commercial.html',);
return $this->render('manager.html',);
