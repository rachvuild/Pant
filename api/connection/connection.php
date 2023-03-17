<?php
include('../../src/ConnectionBdd.php');
// header("Content-Type: application/json");
// Connexion à la base de données avec PDO
// $host = "pantgstpant.mysql.db";
// $dbname = "pantgstpant";
// $username = "pantgstpant";
// $password1 = "Pantgsb691";
// $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
// $options = [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES => false,
// ];
// try {
//     $pdo = new PDO($dsn, $username, $password1, $options);
// } catch (PDOException $e) {
//     throw new PDOException($e->getMessage(), (int)$e->getCode());
// }

// Récupération des valeurs envoyées par l'application externe
$email = $_POST["id_user"];
$password = $_POST["pwd_user"];

// Requête pour vérifier si les valeurs correspondent à celles de la base de données
$stmt = $pdo->prepare("SELECT * FROM user WHERE id_user=?");
$stmt->execute(array("$email"));
$count = $stmt->rowCount();

if ($count > 0) {
    foreach ($stmt as $data) {
        if (password_verify($password, $data['pwd_user'])) {
            $req = "SELECT * FROM `token` WHERE id_user = '$email'";
            $req = $pdo->prepare($req);
            $req->execute();
            $data = $req->fetchAll();
            if (!empty($data)) {
                $date = $data[0]['date_token'];
                $interval = diffDate($date);
                // var_dump($interval);
            } else {
                $date = date("Y-m-1-d H:i:s");
                $interval = diffDate($date);
                // var_dump($interval);
            }

            if ($interval->days > 0) {
                // var_dump("1");
                if (!empty($data) or !empty($_SESSION['date'])) {
                    // var_dump("2");

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
                $secure_token = ['dateTime' => $date, 'token' => "$secure_token"];
            } elseif (!empty($data)) {
                $req = "SELECT * FROM `token` WHERE id_user = '$login'";
                $req = $pdo->prepare($req);
                $req->execute();
                $data = $req->fetchAll();
                $secure_token = json_encode(['dateTime' => $data[0]['date_token'], 'token' => $data[0]['token']]);
            }
            if (empty($login) and empty($mdp) and empty($_SESSION['date'])) {
                echo json_encode(['erreur' => 'eurreur log or session']);
            }
            $json = array("status" => 200, "message" => "Success", "data" => $secure_token);
        } else {

            $json = array("status" => 400, "message" => "Error");
        }
    }
}

echo json_encode($json);

// Fermeture de la connexion à la base de données
$pdo = null;




/**
 * -----------------------------------------------------------------------------------------------------------------
 * -----------------------------------------------------------------------------------------------------------------
 * -----------------------------------------------------------------------------------------------------------------
 * -----------------------------------------------------------------------------------------------------------------
 * -----------------------------------------------------------------------------------------------------------------
 * -----------------------------------------------------------------------------------------------------------------
 * -----------------------------------------------------------------------------------------------------------------
 */


session_start();

/**
 * recuperation des données en POST pour un meilleur sercurité
 */
/** */
// if (!empty($_SESSION['date'])) {
//     $date = $_SESSION['date'];
//     $interval = diffDate($date);
// }
// $login = htmlspecialchars($_POST['log']);
// $mdp = htmlspecialchars($_POST['password']);

// if (!empty($login) and !empty($mdp)) {

//     $connection_user = "SELECT * FROM `user` WHERE id_user ='$login' ";
//     $connection_user = $pdo->prepare($connection_user);
//     $connection_user->execute();
//     $recipes = $connection_user->fetchAll();
//     // var_dump('1');
//     /**
//      * verification mot de passe et login
//      */
//     if (!empty($recipes) and password_verify($mdp, $recipes[0]['pwd_user'])) {
//         // var_dump('2');

//         /**
//          * je recuper mes tokens
//          */
//         $req = "SELECT * FROM `token` WHERE id_user = '$login'";
//         $req = $pdo->prepare($req);
//         $req->execute();
//         $data = $req->fetchAll();
//         if (!empty($data)) {
//             $date = $data[0]['date_token'];
//             $interval = diffDate($date);
//             // var_dump($interval);
//         } else {
//             $date = date("Y-m-1-d H:i:s");
//             $interval = diffDate($date);
//             // var_dump($interval);
//         }
//     }
// }
// /**
//  * si il n'est pas vide et que il y a des tokens ducoup : 
//  * -> je créer un date aujourd'hui 
//  * ->recupère la date du token 
//  * ->puis je faire une date_diff ca nous donné que la differance de date 
//  */


// /**
//  * si il y a pas de token dans la bdd ou si la differance de date et superieur a 0 donc min 1 alors :
//  * -> je vide la table token 
//  * -> je créer une chaine de carataire en hexa random 
//  * ->je créer notre clée privé
//  * ->je array avec time ex : (1660338149) et mon random puis je le met en json
//  * -> puis je le crypt avec ma clé en sha256 
//  * -> puis je lencode encor en json puis en base64 et en string 
//  * ->puis jenvoi mon token et un date aujourd'hui a ma bdd
//  * ->puis jencode en json et laffiche pour que la personne puis la recuperai
//  */

// if ($interval->days > 0) {
//     // var_dump("1");
//     if (!empty($data) or !empty($_SESSION['date'])) {
//         // var_dump("2");

//         session_destroy();
//         $req = "DELETE FROM `token` WHERE id_user = '$login'";
//         $req = $pdo->prepare($req);
//         $req->execute();
//     }
//     $secure_token = createToken();
//     $date = date("Y-m-d H:i:s");
//     $req = "INSERT INTO `token`( `token`, `date_token`, `id_user`) VALUES ('$secure_token','$date','$login')";
//     $req = $pdo->prepare($req);
//     $req->execute();
//     $_SESSION['token'] = $secure_token;
//     $_SESSION['date'] = $date;
//     $secure_token = json_encode(['dateTime' => $date, 'token' => "$secure_token"]);

//     echo $secure_token;
// } elseif (!empty($data)) {
//     $req = "SELECT * FROM `token` WHERE id_user = '$login'";
//     $req = $pdo->prepare($req);
//     $req->execute();
//     $data = $req->fetchAll();
//     $data_json = json_encode(['dateTime' => $data[0]['date_token'], 'token' => $data[0]['token']]);
//     echo $data_json;
// }
// if (empty($login) and empty($mdp) and empty($_SESSION['date'])) {
//     echo json_encode(['erreur' => 'eurreur log or session']);
// }



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
