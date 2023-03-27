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
        <form action="" method="POST">
            <label for="texte_commentaire">Votre commentaire</label>
            <input type="text" name="texte_commentaire">
            <label for="note_commentaire">Votre note</label>
            <input type="text" name="note_commentaire">
            <input type="submit" name="submit" value="Ajouter">
        </form>
    </div>
</body>
</html>