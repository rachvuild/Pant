<?php
session_start();
session_destroy();
echo '<a href="index.php">click ici</a>';
header('refresh:0; url=connexion.php');
