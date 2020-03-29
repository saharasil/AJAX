<?php
//print_r($_POST);
$pdo = new PDO('mysql:host=localhost;dbname=forum',// driver mysql (IBM, ORACLE, ODBC...), nom du serveur (host), nom de la BDD (dbname), 
                'root', // Pseudo de la BDD
                '',     // mot de passe de la BDD
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Pour afficher les erreurs SQL dans le navigateur
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',// Pour définir le charset des échanges avec la BDD
                ));
                
            if (!empty($_POST)) { // si le formulaire a été envoyé, $post n'est pas vide
                //Validation du formulaire :
​
                if (isset($_POST['pseudo']) && isset($_POST['mdp'])){ 

                    $requete = $pdo->prepare("INSERT INTO membre (pseudo, mdp) VALUE (:pseudo, :mdp)"); 
                    $succes = $requete->execute(array(
                                    ':pseudo'   => $_POST['pseudo'],
                                    ':mdp'      =>$_POST['mdp'],




                }else{
                    $retour ='<p> Veuillez eremplir tous les champs</p>';
                }
               
            }

   	
?>