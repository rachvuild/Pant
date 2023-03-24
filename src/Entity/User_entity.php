
<?php

function ConnectionUser(
    $pdo,
    $id_user,
    $pwd_user
) {
    if (isset($_POST['LOGIN'])) {
        //get id and password of user in form connexion.html

        // is for hash password


        //get  user in data base
        $connection_user = "SELECT * FROM `user` WHERE id_user ='$id_user' ";
        $connection_user = $pdo->prepare($connection_user);
        $connection_user->execute();
        $recipes = $connection_user->fetchAll();

        //check if there is a return from the database to know if there is a connection
        if (password_verify($pwd_user, $recipes[0]['pwd_user'])) {
            $roles_user = $recipes[0]["id_job"];
            echo "connexion bon";
            $_SESSION["id_user"] = $id_user;
            $_SESSION["roles_user"] = $roles_user;
            //returns a view according to the roles
            if ($roles_user == 1) {
                header('Location: ../Controller/homePageCom.php');
            } elseif ($roles_user == 2) {
                header('Location: ../Controller/homePageCom.php');
            } elseif ($roles_user == 3) {
                header('Location: ../Controller/homepage_n2.php');
            }
        } else {
            echo "mot de passe ou id n'est pas bon <br>
            <a href='../../template/connexion.php'> Reconnectez vous</a>";
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

    $pwd_user = password_hash($pwd_user, PASSWORD_DEFAULT);

    $register_user =
        "
    INSERT INTO `user`(`id_user`, `mail_user`, `name_user`, `fname_user`, `pwd_user`, `id_job`, `id_dep`) 
    VALUES ('$id_user','$email_user','$name_user','$fname_user','$pwd_user',$id_job,$id_dep)
    ";


    $register_user = $pdo->prepare($register_user);
    $register_user->execute();
    // $register_user->fetchAll();
    // echo $register_user;
}
function Getuser($pdo, $id_user)
{
    $connection_user = "SELECT u.id_user,u.mail_user,u.name_user,u.fname_user,j.label_job FROM user u 
    INNER JOIN job j ON u.id_job=j.id_job
    WHERE u.id_user= '$id_user'";
    $connection_user = $pdo->prepare($connection_user);
    $connection_user->execute();
    $user = $connection_user->fetchAll();
    return $user;
}
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
}
