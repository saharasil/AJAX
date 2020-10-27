<?php
//  print_r($_POST);

$contenu = '';
if(!empty($_POST['nom'] ) && !empty($_POST['email']) && !empty($_POST['message']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
         
    $contenu .= '<span style="color: green">Merci pour votre message</span>';
}else {
    $contenu .= '<span style="color: red">Veuillez vérifier vos saisies</span>';

}
 echo $contenu; // envoir de la réponse au client (JS)