<?php
//Fetch all sample
$sample = "SELECT * FROM `sample`";
$sample_req = $pdo->prepare($sample);

// =============================================================================================================================================
//Insert sample in database
if (isset($_POST['REGISTER_SAMPLE'])) {
    $label = $_POST['label'];
    $insert_samples = "INSERT INTO `sample`(`label_sample`) VALUES ('$label')";
    $insert_samples = $pdo->prepare($insert_samples);
    $insert_samples->execute();
}

// =============================================================================================================================================
//Delete sample
if (isset($_POST['DELETE_SAMPLE'])) {
    $sample_choice = $_POST['id_sample'];
    $donner_sample_delete = "DELETE FROM `donner` WHERE id_sample=$sample_choice";
    $donner_sample_delete = $pdo->prepare($donner_sample_delete);
    $donner_sample_delete->execute();
    $sample_delete = "DELETE FROM `sample` WHERE id_sample=$sample_choice";
    $sample_delete = $pdo->prepare($sample_delete);
    $sample_delete->execute();
}

// =============================================================================================================================================
//Update sample
if (isset($_POST['UPDATE_SAMPLE'])) {
    $label_sample = $_POST['label_sample'];
    $sample_choice = $_POST['id_sample'];
    if (!empty($label_sample)) {
        $sample_update = "UPDATE `sample` SET `label_sample`='$label_sample' WHERE `id_sample`=$sample_choice";
        $sample_update = $pdo->prepare($sample_update);
        $sample_update->execute();
    }
}
if ($_SESSION == null) {
    header("location: index.php");
}
