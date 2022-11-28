<?php

// afficher le compte rendu selectionné
if (isset($_POST['Commenter'])) {
    $id_report = $_POST['id_report'];
    $commentary = $pdo->prepare("SELECT DISTINCT summary_report, interest_report, id_user FROM report WHERE id_report=?");
    $commentary->execute(array($id_report));
}
if ($_SESSION == null) {
    header("location: index.php");
}
