<?php


function repportDepartement($pdo, $id_user)
{

    $request = "SELECT d.id_dep FROM user u
    INNER JOIN department d ON u.id_dep=d.id_dep
    WHERE id_user = ?";
    $request = $pdo->prepare($request);
    $request->execute([$id_user]);
    $departement = $request->fetchAll();
    // var_dump($departement[0]['id_dep']);
    // die;
    $req = "SELECT cl.label_client,cl.nom_client,u.id_user,r.summary_report,r.interest_report,r.date_repport, r.id_report FROM report r
INNER JOIN client cl ON cl.id_client=r.id_client
LEFT JOIN comments c ON  c.id_report=r.id_report
LEFT JOIN user u ON u.id_user=r.id_user
LEFT JOIN department d ON d.id_dep=u.id_dep
WHERE c.id_com IS NULL AND d.id_dep=?";
    $req = $pdo->prepare($req);
    $req->execute([$departement[0]['id_dep']]);
    $repport = $req->fetchAll();
    return $repport;
};
