<?php
//Fetch all sample
$sample = "SELECT * FROM `sample`";
$sample_req = $pdo->prepare($sample);

if ($_SESSION == null) {
    header("location: index.php");
}
