<html>
<body>
    <div class="header">
        <p><?= $id_user ?></p>
        <?php
        if ($id_job == 2) {
            echo "<a href='list.php'>Mon équipe</a>";
        }
        if($id_job == 1 or $id_job == 2){
            echo "<a href='report_controller.php'>Mes comptes rendu</a>";
        }
        if($id_job==3){
            echo "<a href='modif_sample.php'>Modifier les échantillons</a>";
        }
        ?>
        
        <a href="../../template/destroy.php">se deconnecter</a>
    </div>
</body>

</html>