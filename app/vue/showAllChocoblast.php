<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public_asset/style/style.css">

    <title>Document</title>
</head>
<body>

<?php include './app/vue/viewMenu.php'?>
<div class="placeCards">


    <?php 
    foreach($data as $value){
            echo '<div class ="chocoblastCard"><b>Nom Prénom CIBLE : </b>'.$value->nom_cible.' '.$value->prenom_cible.' </br><b>Nom Prénom AUTEUR : </b>'.$value->nom_auteur.' '.$value->prenom_auteur.'</br><b>Date : </b>'.$value->date_chocoblast.'</br><i>"'.$value->slogan_chocoblast.'"</i></div>';
        }
    ?>
</div>
</body>
</html>