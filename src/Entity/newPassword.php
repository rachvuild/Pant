<?php

function updatepwd($pdo, $id_user, $newpwd)
{
    $newpwd = password_hash($newpwd, PASSWORD_DEFAULT);
    $modif = $pdo->prepare("UPDATE user SET pwd_user=? WHERE id_user=?");
    $modif->execute(array("$newpwd", "$id_user"));
    echo "<script>alert('Mot de passe modifié!');
    document.location.href='homePageCom.php';
    </script>";
}