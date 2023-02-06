<?php


    if(isset($_POST['REPORT_CLIENT'])){
        echo "oui";}
        /*$summary = $_POST['summary'];
        $interest = $_POST['interest'];
        $id_client = $_POST['id_client'];
        $id_user = $_POST['id_user'];
        $id_appoint = $_POST['id_appoint'];

        // Register report in database
        $registerReport =
            "INSERT INTO `report`(`summary_report`, `interest_report`, `id_client`, `id_user`, `id_appoint`) 
        VALUES ('$summary','$interest',$id_client,'$id_user',$id_appoint)";
        $registerReport = $pdo->prepare($registerReport);
        if ($registerReport->execute()) {
            $reponse = $pdo->query('SELECT `id_report` FROM `report` ORDER BY `id_report` DESC');
            $donnees = $reponse->fetch();
            $id_report = $donnees['id_report'];
            echo $id_report;
            $reportinsert=1;
        }



        //Fetch all sample
        $sample = "SELECT * FROM `sample`";
        $sample_req = $pdo->prepare($sample);
        // Register Sample
        if ($sample_req->execute()) {
            foreach ($pdo->query($sample) as $ligne) {
                $nbSample = $_POST['' . $ligne[1] . ''];
                echo 'ligne: ' . $ligne[0] . 'id report :' . $id_report . 'nb sample :' . $nbSample . '</br>';
                if (!empty($nbSample)) {
                    $nbSample = $_POST['' . $ligne[1] . ''];
                    $sampleInsert = "INSERT INTO `donner`(`id_sample`, `id_report`, `nb_sample`) VALUES ($ligne[0],$id_report,$nbSample)";
                    $sampleInsert = $pdo->prepare($sampleInsert);
                    if($sampleInsert->execute()){
                        $samplereport=1;
                    }
                }
            }
        }
        if($samplereport==1 AND $reportinsert=1){
            echo "<script>alert('Compte rendu ajouté!');
            document.location.href='homePageCom.php';
            </script>";
        }
    }*/