<?php

// print_r($_POST);
// connexion àla BDD 
$pdo = new PDO('mysql:host=localhost;dbname=newsletter',
               'root', // pseudo
               '', 
               array(
                   PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                   PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
              ));

if(!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ // si le champs existe

    //Echeppement des données
    $_POST['email'] = htmlspecialchars($_POST['email']); //contre les risques JS d'insertion
    //requête prèparée d'insertion :
    $resultat = $pdo->prepare("INSERT INTO abonne (email) VALUE (:email)");
    $resultat->execute(array(
                    ':email' => $_POST['email']
                        ));
    $retour = '<span style="color: green"> Vous êtes inscrit à la newsletter ! </span>';

}else{ // si le champ est vide 
    $retour ='<span style="color: red"> Veuillez remplir votre email ! </span>';
}
echo $retour; // on envoiele HTML au navigateur. Pas de json_encode() car le JS n'attend pas du JSON mais du HTML.