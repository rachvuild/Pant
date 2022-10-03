<?php
require('../ConnectionBdd.php');
$pdo = ConnexionBdd();
function GetDepartmentController($pdo)
{
    $connection_user = "SELECT * FROM `department` WHERE 1";
    $connection_user = $pdo->prepare($connection_user);
    $connection_user->execute();
    $recipes = $connection_user->fetchAll();
    // var_dump($recipes);
    return;
}
