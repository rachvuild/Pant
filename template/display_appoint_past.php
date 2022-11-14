<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Rendez-vous passez</h1>
    <?php
    if ($past->execute()) {
        foreach ($pdo->query($pastdate) as $ligne) {
            echo "
                <table class='appoint_past'>
                    <thead>
                        <tr>
                            <th>" . $ligne[0] . "</th>
                        </tr>
                    </thead>";
            $pastd = Dayspast($ligne[0], $id_user, $pdo);
            foreach ($pastd as $ligne) {
                echo "
                    <tbody>
                        <td>" . $ligne[5] . "</td>
                        <td>" . $ligne[1] . "</td>
                        <td>";
                $v=Verif($ligne[2],$pdo);
                if($v=="no exist"){
                    echo "
                     <form method='post' action='sampleController.php'>
                        <p>
                            <input type='number' name='id_appoint' id='id_appoint' value='" . $ligne[2] . "' hidden /><br/>
                            <input type='text' name='id_user' id='id_user' value='" . $ligne[3] . "' hidden /><br/>
                            <input type='number' name='id_client' id='id_client' value='" . $ligne[4] . "' hidden /><br/>                
                            <input type='submit' value='rédiger compte rendu' />
                        
                        </p>
                        </form></td>
                    </tbody>
                </table>";
                }
                else{
                    echo "
                     <form method='post' action=''>
                        <p>
                            <input type='number' name='id_appoint' id='id_appoint' value='" . $ligne[2] . "' hidden /><br/>
                            <input type='text' name='id_user' id='id_user' value='" . $ligne[3] . "' hidden /><br/>
                            <input type='number' name='id_client' id='id_client' value='" . $ligne[4] . "' hidden /><br/>                
                            <input type='submit' value='coucou' />
                        
                        </p>
                        </form></td>
                    </tbody>
                </table>";
                }
            };
        }
    }
    ?>
</body>

</html>