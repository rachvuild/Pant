<?php

function ConnectionUser(

    $pdo,
    $id_user,
    $pwd_user
) {
    if (isset($_POST['LOGIN'])) {
        //get id and password of user in form connexion.html

        // is for hash password
        $pwd_user = password_hash($pwd_user, PASSWORD_DEFAULT);
        // // echo $pwd_user;

        //get  user in data base
        $connection_user = "SELECT * FROM `user` WHERE id_user ='$id_user' AND pwd_user ='$pwd_user'";
        $connection_user = $pdo->prepare($connection_user);
        $connection_user->execute();
        $recipes = $connection_user->fetchAll();
        var_dump($recipes);
        // get element roles of user
        $roles_user = $recipes[0][0];


        //check if there is a return from the database to know if there is a connection
        if ($recipes != null) {

            echo "connexion bon";

            //returns a view according to the roles
            if ($roles_user == 1) {
                return fopen('../../tamplate/session/visitor.html', 'r');
                // echo "polop";
            } elseif ($roles_user == 2) {
                return fopen('../../tamplate/session/visitor.html', 'r');
            } elseif ($roles_user == 3) {
                // return fopen('manager.html');
            }
        } else {
            echo "mot de passe ou id n'est pas bon";
        }
    }
}


function RegisterUser(
    $pdo,
    $id_job,
    $id_user,
    $email_user,
    $name_user,
    $fname_user,
    $pwd_user,
    $id_dep
) {
    if (isset($_POST['REGISTER'])) {
        $pwd_user = password_hash($pwd_user, PASSWORD_DEFAULT);
        $register_user =
            "
    INSERT INTO `user`(`id_user`, `mail_user`, `name_user`, `fname_user`, `pwd_user`, `id_job`, `id_dep`) 
    VALUES ('[$id_user]','[$email_user]','[$name_user]','[$fname_user]','[$pwd_user]','$id_job','$id_dep')
    ";

        $register_user = $pdo->prepare($register_user);
        $register_user->execute();
        $register_user->fetchAll();
    }
}
function Getuser($pdo)
{
    // $connection_user = "SELECT * FROM `user` WHERE 1";
    // $connection_user = $pdo->prepare($connection_user);
    // $connection_user->execute();
    // $recipes = $connection_user->fetchAll();
    // var_dump($recipes);
}
