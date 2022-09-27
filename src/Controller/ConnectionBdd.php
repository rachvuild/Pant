<?php
function ConnexionBdd()
{
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=pant1;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    echo ("Connection réussi</br>");
}
