<?php

// print_r($_POST);
// connexion àla BDD 
$pdo = new PDO('mysql:host=localhost;dbname=forum',
               'root', // pseudo
               '', 
               array(
                   PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                   PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
              ));
// print_r($_POST);
if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){ // si les deux champs sont remplis

            foreach($_POST as $indice => $valeur){//un foreach pour échapper les données afin de  sécurisé lesdonnées
                $_POST[$indice] =htmlspecialchars($valeur);
            }
            

                $query = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp");
                $query->execute(array(  ':pseudo' => $_POST['pseudo'],
                                        ':mdp'  => $_POST['mdp']
                                    ));

                    if($query->rowCount()!= 0){ 
                        // le pseudo et le mdp existe pour 1 membre :

                            $message = '<span style="color: green"> vous êtes connecté!</span>';
                    }else{ //erreur sur lesidentifiants car il n'ya pas de membre avec le pseudo et mdp donnés par l'internaute
                            $message = '<span style="color: red"> Erreur sur les identifiants.</span>';
                    }


}else { // sinon si l'un des champs est vide 
    $message = '<span style="color: red">Veuillez remplir tous les champs.</span>';
}

 echo $message;