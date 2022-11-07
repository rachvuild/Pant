
<?php
session_start();

function ConnectionUser(
    $pdo,
    $id_user,
    $pwd_user
) {
    if (isset($_POST['LOGIN'])) {
        //get id and password of user in form connexion.html

        // is for hash password
        $pwd_user = md5($pwd_user);
        // echo $pwd_user;
        // // echo $pwd_user;

        //get  user in data base
        $connection_user = "SELECT * FROM `user` WHERE id_user ='$id_user' AND pwd_user ='$pwd_user'";
        $connection_user = $pdo->prepare($connection_user);
        $connection_user->execute();
        $recipes = $connection_user->fetchAll();

        // get element roles of user
        // var_dump($recipes);
        // echo $roles_user;

        //check if there is a return from the database to know if there is a connection
        if ($recipes != null) {
            $roles_user = $recipes[0]["id_job"];
            echo "connexion bon";
            $_SESSION["id_user"] = $id_user;
            $_SESSION["roles_user"] = $roles_user;
            //returns a view according to the roles
            if ($roles_user == 1) {
                header('refresh:0; url=../../template/connect.php');
                // echo "polop";
            } elseif ($roles_user == 2) {
                header('refresh:0; url=../../template/connect.php');
            } elseif ($roles_user == 3) {
                header('refresh:0; url=../../template/connect.php');
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
    if (isset($_POST['REGISTER'])) {
        $pwd_user = md5($pwd_user);
        $register_user =
            "
    INSERT INTO `user`(`id_user`, `mail_user`, `name_user`, `fname_user`, `pwd_user`, `id_job`, `id_dep`) 
    VALUES ('$id_user','$email_user','$name_user','$fname_user','$pwd_user','$id_job','$id_dep')
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


// ============================================================================== //
// Insert client in database
function RegisterClient(
    $pdo,
    $pc,
    $city,
    $address,
    $phone,
    $label
) {
    if (isset($_POST['REGISTER_CLIENT'])) {
        // Insert data in client table
        $register_clients = "INSERT INTO `client`(`pc_client`, `city_client`, `address_client`, `phone_client`, `label_client`)
    VALUES ('$pc','$city','$address','$phone','$label')";

        $register_clients = $pdo->prepare($register_clients);
        $register_clients->execute();
        $register_clients->fetchAll();
    }
}


// ============================================================================== //
// Update client in database
function UpdateClient(
    $pdo,
    $id_client,
    $pc,
    $city,
    $address,
    $phone,
    $label
) {
    if (isset($_POST['UPDATE_CLIENT'])) {
        $update_client = "UPDATE client SET ";
        if (!empty($pc)) {
            $update_client = $update_client . "pc_client= '" . $pc . "',";
        }
        if (!empty($city)) {
            $update_client = $update_client . "city_client= '" . $city . "',";
        }
        if (!empty($age)) {
            $update_client = $update_client . "address_client= " . $address . ",";
        }
        if (!empty($mail)) {
            $update_client = $update_client . "phone_client= '" . $phone . "',";
        }
        if (!empty($tel)) {
            $update_client = $update_client . "label_client= '" . $label . "',";
        }
        $update_client = substr($update_client, 0, -1) . " WHERE id_client=" . $id_client;
        echo $update_client;
        $update_client = $pdo->prepare($update_client);
        $update_client->execute();
    }
}


// ============================================================================== //
// Insert report in database
function RegisterReport(
    $pdo,
    $id_user,
    $id_client,
    $summary,
    $interest
) {
    if (isset($_POST['REGISTER_REPORT'])) {
        $report_client = "INSERT INTO `report`(`id_report`, `summary_report`, `interest_report`, `id_client`, `id_user`, `date_appoint`, `hour_appoint`, `id_appoint`) 
        VALUES ('[value-1]','$summary','$interest','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')";
    }
}