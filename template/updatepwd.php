<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB</title>
</head>

<!-- <body>
    <form action="updateUserPassword.php" method="post">
        <input type="text" name="newpassorwd" placeholder="entrez votre nouveau password">
        <input type="submit" name="updatepwd">
    </form>
</body> -->
<script>
    alert(
</script>
<form action='updateUserPassword.php' method='post'><input type='text' name='newpassorwd' placeholder='entrez votre nouveau password'><input type='submit' name='updatepwd'></form>
<script>
    );
</script>

</html><?php if ($_SESSION == null) {
            header("location: index.php");
        } ?>