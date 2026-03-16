<?php

include(MODEL . '/table_result.php');

$results['prenom'] = "test";
$results['nom'] = "test2";
$results['resultat'] = 5;
$results['temps'] = 6;

try{
    DBResults::addResult($results);
}

catch(PDOException $e){
    $error = $e->getMessage();
}


include(VIEW .'/backoffice_view.php');

