<?php

function ConnectionUser(

    $pdo,
    $id_user,
    $pwd_user
) {
    if (isset($_POST['LOGIN'])) {

        // is for hash password
        $pwd_user = md5($pwd_user);

        //get  user in data base
        $connection_user = "SELECT * FROM `user` WHERE id_user ='$id_user' AND pwd_user ='$pwd_user'";
        $connection_user = $pdo->prepare($connection_user);
        $connection_user->execute();
        $user = $connection_user->fetchAll();

        // get element roles of user

        $password_user = $user[0]['password'];
        $roles_user = $user[0]['id_job'];


        if ($pwd_user == $password_user) {
            session_start();
            $_SESSION['id_user'] = $id_user;
            $_SESSION['roles_user'] = $roles_user;

            //check if there is a return from the database to know if there is a connection
            if ($user != null) {
                echo "<a href='../../template/register.php'>ici</a>";

                //returns a view according to the roles
                if ($roles_user == 1) {

                    header("../../tamplate/session/visitor.html");
                    // echo "polop";
                } elseif ($roles_user == 2) {

                    header("../../tamplate/session/visitor.html");
                } elseif ($roles_user == 3) {
                    header("../../tamplate/session/visitor.html");
                    // return fopen('manager.html');
                }
            }
        } else {
            echo "<a href='../../template/conneixon.html'>ici</a>";
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
    if (isset($_POST['REGISTER_USER'])) {

        $pwd_user = md5($pwd_user);
        $register_user =
            "
    INSERT INTO `user`(`id_user`, `mail_user`, `name_user`, `fname_user`, `pwd_user`, `id_job`, `id_dep`) 
    VALUES ('$id_user','$email_user','$name_user','$fname_user','$pwd_user','$id_job','$id_dep')
    ";

        $register_user = $pdo->prepare($register_user);
        $register_user->execute();
        $register_user->fetchAll();
    } else {
        echo "mot de passe ou id n'est pas bon";
    }
}


// function Getuser($pdo)
// {
//     $connection_user = "SELECT * FROM `user` WHERE 1";
//     $connection_user = $pdo->prepare($connection_user);
//     $connection_user->execute();
//     $recipes = $connection_user->fetchAll();
//     var_dump($recipes);
// }
