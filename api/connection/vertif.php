<?php
function verifTok($token, $pdo)
{

    $req = "SELECT `date_token`, `id_user` FROM `token` WHERE token = '$token'";

    $req = $pdo->prepare($req);
    $req->execute();
    $data = $req->fetchAll();
    if (!empty($data)) {
        $interval = diffDate($data[0]['date_token']);

        if ($interval->d >= 0) {
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}
