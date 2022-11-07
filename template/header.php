<html>
    <body>
        <div>
            <p><?= $id_user ?></p>
            <?php
                if($id_user==2){
                    echo "<a href='list.php'>Mon équipe</a>";
                }
            ?>
            <a href="../../template/destroy.php"></a>
        </div>
    </body>
</html>