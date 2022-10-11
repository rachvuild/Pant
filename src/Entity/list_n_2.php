<?php
require ('../ConnectionBdd.php');
$pdo=ConnexionBdd();
//print n+1
//$request="SELECT mail_user, name_user, fname_user, id_user FROM `user` WHERE id_job=2;";
//$req = $pdo->prepare($request);

//print id_region of user
$requestr="SELECT region.id_region FROM department, region, user WHERE user.id_dep=department.id_dep AND department.id_region=region.id_region AND id_user='t.letoublon'";
$reqr=$pdo->query($requestr);
while($id_r=$reqr->fetch()){
    $id_r=$id_r['id_region'];
    //print all id_department from region
    $requestd="SELECT id_dep FROM department, region WHERE region.id_region='$id_r' AND region.id_region=department.id_region";
    echo $requestd;
    $reqd=$pdo->prepare($requestd);
    if ($reqd->execute())
        {
            echo "le nombre de colones retournées est = ".$reqd->rowCount()."<br/>";
            foreach ($pdo->query($requestd) AS $ligne)
            {
                for ($i=0;$i<=$reqd->rowCount()-1;$i++)
            {
                echo $ligne[$i];
            }
            }
        }
        $reqd->closeCursor();
    }
var_dump($ligne);
echo "<br/>".$ligne[0];
