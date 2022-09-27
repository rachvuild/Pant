<?php
require('ConnectionBdd.php');
function ConnectionUser($pdo)
{

    //get id and password of user in form connexion.html
    $id_user = $_POST['id_user'];
    $pwd_user = $_POST['pwd_user'];

    // is for hash password
    $pwd_user = hash($id_user, $pwd_user);
    echo $pwd_user;
    //get  user in data base
    $connection_user = "SELECT * FROM `user` WHERE id_user ='$id_user' AND pwd_user ='$pwd_user'";
    $connection_user = $pdo->prepare($connection_user);
    $connection_user->execute();
    $recipes = $connection_user->fetchAll();

    // get element roles of user
    $roles_user = $recipes[0][0];


    if ($recipes != null) {
        echo "connexion bon";
    } else {
        echo "mot de passe ou id n'est pas bon";
    }

    if ($roles_user == 1) {
        return fopen('../../tamplate/session/visitor.html', 'r');
        // echo "polop";
    } elseif ($roles_user == 2) {
        return fopen('../../tamplate/session/visitor.html', 'r');
    } elseif ($roles_user == 3) {
        // return fopen('manager.html');
    }
}
