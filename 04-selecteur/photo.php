<?php
$pdo = new PDO('mysql:host=localhost;dbname=tapis',
               'root', // pseudo
               '', 
               array(
                   PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                   PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
              ));
// print_r($_POST);
$contenu = '';
              if(isset($_POST['attribut'])){ // si on a recut la valeur de l'attribut qui contient l'id_produit 

                    $attribut = $_POST['attribut'];
                    // echo $attribut;
                    $query =$pdo->query("SELECT photo FROM produit WHERE id_produit = $attribut");
                    $photo = $query->fetch(PDO::FETCH_ASSOC);

                    $contenu .='<img src="selecteurs_produits/'.$photo['photo'] .'">';            

              }else{
                  $contenu .= '<p>Produit n\'existe pas </p>'; 
              }

echo $contenu;