<?php
//print n+1
//$request="SELECT mail_user, name_user, fname_user, id_user FROM `user` WHERE id_job=2;";
//$req = $pdo->prepare($request);

//print id_region of user
$requestr="SELECT region.id_region FROM department, region, user WHERE user.id_dep=department.id_dep AND department.id_region=region.id_region AND id_user='t.letoublon'";
$reqr=$pdo->query($requestr);
while($id_r=$reqr->fetch()){
    $id_r=$id_r['id_region'];
    //print all user information from region
    $requestd="SELECT department.id_dep, label_dep, mail_user, name_user, fname_user, id_user FROM department, region, user WHERE region.id_region=$id_r AND region.id_region=department.id_region AND department.id_dep=user.id_dep";
    $reqd=$pdo->prepare($requestd);}
