<?php
include('../ConnectionBdd.php');


function GetDepartmentController($pdo)
{
    $GetDepartement = "SELECT * FROM `department` WHERE 1";

    $GetDepartement = $pdo->prepare($GetDepartement);
    $GetDepartement->execute();

    $recipes = $GetDepartement->fetchAll();
    // var_dump($recipes);
    return $recipes;
}
