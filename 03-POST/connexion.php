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
 if(!empty($_POST) && !empty($_POST['pseudo']) && !empty($_POST['mdp'])){

            foreach($_POST as $indice => $valeur){//un foreach pour sécurisé 
                $_POST[$indice] =htmlspecialchars($valeur);
            }

            $requete = $pdo->prepare("INSERT INTO membre (pseudo, mdp) VALUE (:pseudo, :mdp)"); 
            $succes = $requete->execute(array(
                            ':pseudo'   => $_POST['pseudo'],
                            ':mdp'      =>$_POST['mdp'],
            ));
        

            if($succes){
                $query = $pdo->query("SELECT * FROM membre");
                    if($query->rowCount() != 0){
                        $message = '<span style="color: green"> vous êtes connecté!</span>';

                    }else {
                        $message = '<span style="color: red"> Erreur sur les identifiants.</span>';
                        }
                
            }

}else {
    $message = '<span style="color: red">Veuillez remplir tous les champs.</span>';
}

 echo $message;