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
        <label for="nom_roles">Ajouter un role</label>
        <input type="text" name="nom_roles">
        <input type="submit" name="submit" value="Ajouter">
    </form>
    <div id="error"><?php echo $msg ?></div>
</div>
</body>
</html>