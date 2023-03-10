<html>

<body>
    <div class="all-header">


        <?php
        require('../Entity/User_entity.php');
        $user = Getuser($pdo, $id_user);
        if ($_SESSION == null) {
            header("location: connexion.php");
        }
        if ($id_job == 1 or $id_job == 2) {
            echo "<a  href='homePageCom.php'><img class='img-logo-btn' src='../../img/logo-trans.png' alt=''></a>  <div class='header'>";
            echo "<a class='btn-header' href='report_controller.php'><span class='hover-underline-animation'>Mes comptes rendu</span></a>";
        }
        if ($id_job == 3) {
            echo "<a class='btn-header' href='homepage_n2.php'><img class='img-logo-btn' src='../../img/logo-trans.png' alt=''></a><div class='header'>";
            echo "<a class='btn-header' href='modif_sample.php'><span class='hover-underline-animation'>Modifier les échantillons</span></a>";
        }
        if ($id_job == 2) {
            echo "<a class='btn-header' href='allrepportController.php'> <span class='hover-underline-animation'>Rapport des équipes</span></a>";
            echo "<a class='btn-header' href='list.php'> <span class='hover-underline-animation'>Mon équipe</span></a>";
        }
        ?>
        <a class='btn-header' href="updateUserPassword.php"> <span class="hover-underline-animation"> Modifier votre password</span>

        </a>
        <p class='btn-header' id="infoUser"><span class="hover-underline-animation"><?= $id_user ?></span></p>
        <a class='btn-header' href="../../template/destroy.php"><span class="hover-underline-animation">se deconnecter</span></a>
    </div>
    </div>
    <div class="info-user">
        <?php
        echo "<p>" . $user[0]['id_user'] . "</p>";
        echo "<p>" . $user[0]['mail_user'] . "</p>";
        echo "<p>" . $user[0]['name_user'] . "</p>";
        echo "<p>" . $user[0]['fname_user'] . "</p>";
        echo "<p>" . $user[0]['label_job'] . "</p>";
        ?>

    </div>
    <script>
        const infoUser = document.getElementById('infoUser');
        const info_user = document.querySelector('.info-user');
        infoUser.addEventListener('click', () => {
            info_user.classList.toggle('activeinfoclient');
        });
    </script>
</body>

</html>