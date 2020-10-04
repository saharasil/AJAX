<?php
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

//connexiob à la BDD 
$pdo = new PDO('mysql:host=localhost;dbname=tapis',
               'root', // pseudo
               '', 
               array(
                   PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                   PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
              ));

// Variable : 
$contenu = ''; // pour contenu leHTMLdes tapis à afficher 
$matiere = true;
$couleur = true;
$forme = true;

//On remplit les 3 variables $matière, $couleur et $formepour alimenter la requête SQL :
    // on détermine la variable $matiere :
    if(isset($_POST['matiere'])){ // si on a cliqué sur 1 matière 
        //matier IN ('laine', 'viscose')
        /// on prend les valeurs du tableau $_POST['matiere'] et on les met sous forme de string en séparant les valeurs
        //     echo '<pre>';
        // print_r("matiere IN ('" . implode("','",$_POST['matiere']) ."')");
        // echo '</pre>';
        $matiere = "matiere IN ('" . implode("','",$_POST['matiere']) ."')";
    }
     // on détermine la variable $couleur :

     if(isset($_POST['couleur'])){ // si on a cliqué sur 1 matière 
        //matier IN ('laine', 'viscose')
        /// on prend les valeurs du tableau $_POST['matiere'] et on les met sous forme de string en séparant les valeurs
        //     echo '<pre>';
        // print_r("couleur IN ('" . implode("','",$_POST['couleur']) ."')");
        // echo '</pre>';
        $couleur = "couleur IN ('" . implode("','",$_POST['couleur']) ."')";
    }
    if(isset($_POST['forme'])){ // si on a cliqué sur 1 matière 
        //matier IN ('laine', 'viscose')
        /// on prend les valeurs du tableau $_POST['matiere'] et on lesmet sous forme de string en séparant les valeurs
        //     echo '<pre>';
        // print_r("forme IN ('" . implode("','",$_POST['forme']) ."')");
        // echo '</pre>';
        $forme = "forme IN ('" . implode("','",$_POST['forme']) ."')";
    }

// on fait une requête pour sélectionner les tapis : 
    if ($matiere !== true || $couleur !== true || $forme !== true ){
    $donnees = $pdo->query("SELECT * FROM produit WHERE $matiere AND $couleur AND $forme"); // on selectionne les produits pour les matière est les couleurs et les formes choisie dans le formulaire.Par défaut les trois variables sont à true, on sélectionne donc toutes les matières, couleurs et formes, ce qui permet d'afficher tous les tapis.

    //on prepare l'affichage des produits : 
        if($donnees->rowCount() != 0){
            while($produit = $donnees->fetch(PDO:: FETCH_ASSOC)){
                $contenu .='<div style="width: 15%; float:left;">';
                    $contenu .= '<h2>Tapis ' . $produit['id_produit'] . '</h2>';
                    $contenu .= '<div>
                                    <img src="selecteurs_produits/'.$produit['photo'].'" style="width: 100%" class="photo" data-id_produit="'.$produit['id_produit'].'">
                                </div>';
                $contenu .='</div>';

            }

        }else{
            //s'il n'ya pas de produit à afficher 
            $contenu .= '<p>Aucun produit ne correspond à votre demande</p>';
        }
    }
echo $contenu; // on envoie le HTML au navigateur.