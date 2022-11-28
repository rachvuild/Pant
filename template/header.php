<html>

<body>
    <div class="header">
        <?php
        if ($_SESSION == null) {
            header("location: index.php");
        }
        if ($id_job == 1 or $id_job == 2) {
            echo "<a href='homePageCom.php'>Accueil</a>";
            echo "<a href='report_controller.php'>Mes comptes rendu</a>";
        }
        if ($id_job == 3) {
            echo "<a href='homepage_n2.php'>Accueil</a>";
            echo "<a href='modif_sample.php'>Modifier les échantillons</a>";
        }
        if ($id_job == 2) {
            echo "<a href='list.php'>Mon équipe</a>";
        }
        ?>
        <a href="updateUserPassword.php">Modifier votre password</a>
        <p><?= $id_user ?></p>
        <a href="../../template/destroy.php">se deconnecter</a>
    </div>
</body>

</html>