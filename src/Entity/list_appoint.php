<?php

// print all appointment of the user
$request="SELECT date_appoint, hour_appoint FROM `appointment` WHERE id_user='a.dochez'";
$req = $pdo->prepare($request);