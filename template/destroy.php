<?php
session_start();
session_destroy();
echo '<a href="connexion.php">Clickez ici</a>';
header('refresh:0; url=connexion.php');
