<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <table>
        <caption>Mon équipe</caption>
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
        <tbody> -->
    <?php

    // if ($reqd->execute()) {
    // $pol = $pdo->query($requestd);
    // var_dump($pol);
    sort($alluser);
    // var_dump($AllDepartement);
    // var_dump($alluser[10]);
    foreach ($alluser as $ligne) {
        if ($ligne != null) {

            // foreach ($departement as $dep) {
            //     $num = $dep["id_dep"];
            //     // var_dump($ligne[0]);
            //     $ligne = array_search("$num", $pol);
            //     var_dump($pol);
            //     // if ($dep["id_dep"] == $ligne) {
            //     // }
            // }
            // var_dump($ligne[0]["label_dep"]);
            $label = $ligne[0]["label_dep"];

            echo " <table>
                    <caption> $label </caption>
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
                // var_dump($ligne);

                // var_dump($ligne);

                // var_dump($ligne[0]);
                // var_dump($ligne);
                // [0]=> array(14) { ["id_user"]=> string(11) "t.letoublon" [0]=> string(11) "t.letoublon" ["mail_user"]=> string(4) "adsd" [1]=> string(4) "adsd" ["name_user"]=> string(6) "qsdqsd" [2]=> string(6) "qsdqsd" ["fname_user"]=> string(5) "qsdqd" [3]=> string(5) "qsdqd" ["pwd_user"]=> string(10) "qsddqsdqsd" [4]=> string(10) "qsddqsdqsd" ["id_job"]=> string(1) "3" [5]=> string(1) "3" ["id_dep"]=> string(2) "15" [6]=> string(2) "15" } }
                echo "<tr>
                        <td>" . $ligne["id_dep"] . "</td>
                        <td>" . $ligne["label_dep"] . "</td>
                        <td>" . $ligne["mail_user"] . "</td>
                        <td>" . $ligne["name_user"] . "</td>
                        <td>" . $ligne["fname_user"] . "</td>
                        <td><form method='post' action='affichage.php'>
                        <p>
                        <input type='text' name='id_user' id='id_user' value='" . $ligne[5] . "' hidden /><br/>               
                        <input type='submit' value='Compte rendu' />
                        
                        </p>
                        </form></td>
                        </tr>";
            }
        }
    }
    //     do {

    //         $backligne = clone $ligne[0];
    //     } while ($backligne == $ligne[0]);
    // }

    // $reqd->closeCursor();
    // }
    ?>
    </tbody>
    </table>
</body>

</html>