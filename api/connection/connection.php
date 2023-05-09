<?php
session_start();
include('../../src/ConnectionBdd.php');


// Récupération des valeurs envoyées par l'application externe

if (!empty($_POST["id_user"]) and !empty($_POST["pwd_user"])) {
    $login = htmlspecialchars($_POST["id_user"]);
    $password = htmlspecialchars($_POST["pwd_user"]);


    // Requête pour vérifier si les valeurs correspondent à celles de la base de données
    $stmt = $pdo->prepare("SELECT * FROM user WHERE id_user=?");
    $stmt->execute(array("$login"));

    $count = $stmt->rowCount();

    if ($count > 0) {
        foreach ($stmt as $data) {
            if (password_verify($password, $data['pwd_user'])) {

                if ($data['id_job'] == 1 or $data['id_job'] == 2) {
                    $job = $data['id_job'];
                    $req = "SELECT * FROM `token` WHERE id_user = '$login'";
                    $req = $pdo->prepare($req);
                    $req->execute();
                    $data = $req->fetchAll();
                    if (!empty($data)) {
                        $date = $data[0]['date_token'];
                        $interval = diffDate($date);
                    } else {
                        $date = date("Y-m-1-d H:i:s");
                        $interval = diffDate($date);
                    }
                    if ($interval->days > 0) {
                        if (!empty($data) or !empty($_SESSION['date'])) {
                            session_destroy();
                            $req = "DELETE FROM `token` WHERE id_user = '$login'";
                            $req = $pdo->prepare($req);
                            $req->execute();
                        }
                        $secure_token = createToken();
                        $date = date("Y-m-d H:i:s");
                        $req = "INSERT INTO `token`( `token`, `date_token`, `id_user`) VALUES ('$secure_token','$date','$login')";

                        $req = $pdo->prepare($req);
                        $req->execute();
                        $_SESSION['token'] = $secure_token;
                        $_SESSION['date'] = $date;
                        $secure_tokens = ['dateTime' => $date, 'token' => "$secure_token"];
                    } elseif (!empty($data)) {
                        $req = "SELECT * FROM `token` WHERE id_user = '$login'";
                        $req = $pdo->prepare($req);
                        $req->execute();
                        $data = $req->fetchAll();
                        $secure_tokens = ['dateTime' => $data[0]['date_token'], 'token' => $data[0]['token'], 'id_job' => $job];
                    }
                    $json = array("status" => 200, "message" => "Success", "data" => $secure_tokens);
                } else {
                    $json = array("status" => 400, "message" => "vous n'etes pas autorisé");
                }
            } else {
                $json = array("status" => 400, "message" => "password or login fail");
            }
        }
    } else {
        $json = array("status" => 400, "message" => "not entry data");
    }
    echo json_encode($json);
} else {
    $json = array("status" => 400, "message" => "not entry data");
    echo json_encode($json);
}
// Fermeture de la connexion à la base de données


/**
 *   __                  _   _             
 * / _|                | | (_)            
 *| |_ _   _ _ __   ___| |_ _  ___  _ __  
 *|  _| | | | '_ \ / __| __| |/ _ \| '_ \ 
 *| | | |_| | | | | (__| |_| | (_) | | | |
 *|_|  \__,_|_| |_|\___|\__|_|\___/|_| |_|
 */


function createToken()
{
    $random_string = bin2hex(random_bytes(14));
    $secret_key = "clé-unique";

    $data = array(
        'timestamp' => time(),
        'random_string' => $random_string
    );

    $data_json = json_encode($data);

    $signature = hash_hmac('sha256', $data_json, $secret_key);

    $data['signature'] = $signature;

    $secure_token = strval(base64_encode(json_encode($data)));
    return $secure_token;
}
function diffDate($date)
{
    $origin = date_create(date('Y-m-d H:i:s'));
    $target = date_create($date);
    $interval = date_diff($origin, $target);
    return $interval;
}
