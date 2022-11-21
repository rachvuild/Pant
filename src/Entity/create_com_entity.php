<?php

$id_report=$_POST['id_report'];
// afficher le compte rendu selectionné
if(isset($_POST['Commenter'])){
    $commentary=$pdo->prepare("SELECT DISTINCT summary_report, interest_report, id_user FROM report WHERE id_report=?");
    $commentary->execute(array($id_report));
}

// rentrer le commentaire dans la bdd
if(isset($_POST['valider'])){
    $com=$_POST['com'];
    $commen=$pdo->prepare("INSERT INTO `comments` (comments, id_user, id_report) VALUES (?,?,?)");
    if($commen->execute(array($com, $id_user, $id_report))){
        echo "<script>alert('Commentaire ajouter');
        document.location.href='homePageCom.php';
        </script>";
    }
}
