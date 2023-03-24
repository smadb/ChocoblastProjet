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

<div class="form">
    <h1>Ajouter un chocoblast</h1>

    <form action="" method ="post">

        <label class= "textform" for="cible_chocoblast">Qui est la cible ?</label>
        <select name="cible_chocoblast">
        <?php 
        foreach($data as $value){
            echo '<option value='.$value->id_utilisateur.'>'.$value->nom_utilisateur.' '.$value->prenom_utilisateur.'</option>';
        }
        ?>
        </select>

        <label class= "textform" for="date_chocoblast">Quand ça a eu lieu ?</label>
        <input type="date" name="date_chocoblast">

        <label class= "textform" for="slogan_chocoblast">Slogan du chocoblast</label>
        <input type="textarea" style ="height:3em; margin-bottom:5px;" rows="5" name="slogan_chocoblast">

        
        <input type="submit" value="Ajouter" name="submit">
    </form>

    <div id="error"><?php echo $msg; ?></div>
    </div>
</body>
</html>