<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB</title>
    <link rel="stylesheet" href="../../assert/style.css">
</head>

<body>
    <div class="container_n">
    <table class="table_cr">
        <h2 class="title_home_n2"> Responsable de département </h2>
            <thead>
            <tr>
                <th>Numéro département</th>
                <th>nom département</th>
                <th>mail</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Comptes rendus</th>
            </tr>
            </thead>
            <tbody>
    <?php
    foreach($n1 as $ligne){
        echo "<tr>
                        <td>" . $ligne["id_dep"] . "</td>
                        <td>" . $ligne["label_dep"] . "</td>
                        <td>" . $ligne["mail_user"] . "</td>
                        <td>" . $ligne["name_user"] . "</td>
                        <td>" . $ligne["fname_user"] . "</td>
                        <td><form method='post' action='report_controller.php'>
                        <p>
                        <input type='text' name='id_user' id='id_user' value='" . $ligne[1] . "' hidden /><br/>               
                        <input type='submit' value='Comptes rendus' name='compte_rendu' />
                        
                        </p>
                        </form></td>
                        </tr>";
    }
    ?>
    </div>
    <?php

    sort($alluser);
    foreach ($alluser as $ligne) {
        if ($ligne != null) {

            $label = $ligne[0]["label_dep"];

            echo " <table class='table_cr'>
                    <h2 class='title_home_n2'> $label </h2>
                    <thead>
                    <tr>
                    <th>Numéro département</th>
                    <th>nom département</th>
                    <th>mail</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Compte rendu</th>
                    </tr>
                    </thead>
                    <tbody>";
            foreach ($ligne as $ligne) {
                
                echo "<tr>
                        <td>" . $ligne["id_dep"] . "</td>
                        <td>" . $ligne["label_dep"] . "</td>
                        <td>" . $ligne["mail_user"] . "</td>
                        <td>" . $ligne["name_user"] . "</td>
                        <td>" . $ligne["fname_user"] . "</td>
                        <td><form method='post' action='report_controller.php'>
                        <p>
                        <input type='text' name='id_user' id='id_user' value='" . $ligne[1] . "' hidden /><br/>               
                        <input type='submit' value='Comptes rendus' name='compte_rendu' />
                        
                        </p>
                        </form></td>
                        </tr>";
            }
        }
    }
    ?>
    </tbody>
    </table>
    </div>
</body>

</html>