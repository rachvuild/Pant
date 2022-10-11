<?php 
//Fetch all sample
$sample = "SELECT * FROM `sample`";
$sample_req = $pdo->prepare($sample);
