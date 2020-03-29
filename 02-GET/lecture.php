<?php
$retour = array(); // pour contenir le texte complet 
// print_r($_GET);
if(isset($_GET['paragraphe']) && $_GET['paragraphe'] == 'suite') { 
    $retour['affiche'] = " ARerum dignissimos expedita dolor accusantium officiis placeat ducimus magnam aliquid culpa corporis hic suscipit, cum excepturi. Eum at esse earum laborum consequatur.";
    
    echo json_encode($retour); // on encode  notre tableau en JSON car c'est le format attendu côté JS, puis on l'envoie au navigateur avec echo.

}