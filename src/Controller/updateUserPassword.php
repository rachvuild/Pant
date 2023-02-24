<?php
session_start();
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
} else {
    require('../ConnectionBdd.php');
    require('../../template/updatepwd.php');
    if (isset($_POST['updatepwd'])) {
        $id_user = $_SESSION['id_user'];
        $newpwd = htmlspecialchars($_POST['newpassorwd']);
        require('../Entity/User_entity.php');
        updatepwd($pdo, $id_user, $newpwd);
    }
}
