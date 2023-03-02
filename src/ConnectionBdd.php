<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=pant;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// echo ("Connection réussi</br>");
// return $pdo;
if ($_SESSION == null) {
    header("location: ../template/connexion.php");
}
