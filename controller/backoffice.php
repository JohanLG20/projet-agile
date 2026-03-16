<?php

include(MODEL . '/table_result.php');

$results['prenom'] = "test";
$results['nom'] = "test2";
$results['resultat'] = 5;
$results['temps'] = 6;

try{
   $results = DBResults::getAllResults();
}

catch(PDOException $e){
    $error = $e->getMessage();
}


include(VIEW .'/backoffice_view.php');

