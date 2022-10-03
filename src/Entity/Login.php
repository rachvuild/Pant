<?php
require('../Controller/UserController.php');
if (isset($_POST['LOGIN'])) {
    $id_user = $_POST['id_user'];
    $pwd_user = $_POST['pwd_user'];
    ConnectionUser(
        $pdo,
        $id_user,
        $pwd_user
    );
}
