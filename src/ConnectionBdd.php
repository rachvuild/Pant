<?php
function ConnexionBdd()
{
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=pant;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    echo ("Connection réussi</br>");
    return $pdo;
}
