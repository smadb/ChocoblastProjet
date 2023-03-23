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
        <label for="mail_utilisateur">Votre mail</label>
        <input type="email" name="mail_utilisateur">
        <label for="password_utilisateur">votre mot de passe</label>
        <input type="password" name="password_utilisateur">
        <input type="submit" value="Connexion" name="submit">
    </form>
    <?php
    echo '<p>'.$msg.'</p>';
    ?>
</div>
</body>
</html>