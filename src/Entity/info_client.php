<?php

$id=$_POST['id_client'];
//select information about cliennt
$infoclient="SELECT * FROM client WHERE id_client=$id";
$infoc=$pdo->prepare($infoclient);