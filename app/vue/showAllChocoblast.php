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
<div>

    <?php 
    foreach($data as $value){
            echo '<div class ="chocoblastCard">Nom Prénom CIBLE : '.$value->nom_cible.' '.$value->prenom_cible.' </br>Nom Prénom AUTEUR : '.$value->nom_auteur.' '.$value->prenom_auteur.'</br>Date : '.$value->date_chocoblast.'</br>"'.$value->slogan_chocoblast.'"</div>';
        }
    ?>
</div>
</body>
</html>