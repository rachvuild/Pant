<?php
require('../ConnectionBdd.php');
session_start();
$id_job = $_SESSION["roles_user"];
$id_user = $_SESSION["id_user"];
// rentre le commentaire dans la bdd
if (isset($_POST['valider'])) {
    $com = $_POST['com'];
    $id_report = $_POST['id_report'];
    $commen = $pdo->prepare("INSERT INTO `comments` (comments, id_report, id_user) VALUES (?,?,?)");
    if ($commen->execute(array($com, $id_report, $id_user))) {

        echo "<script>alert('Commentaire ajouter');
        document.location.href='../Controller/list.php';
        </script>";
    }
}
if ($_SESSION == null) {
    header("location: ../../template/connexion.php");
}
