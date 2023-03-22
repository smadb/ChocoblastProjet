<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inscription</h1>

    <form action="" method ="post">
        <label for="nom_utilisateur">Quel est ton nom ?</label>
        <input type="text" name="nom_utilisateur">

        <label for="prenom_utilisateur">quel est ton prénom ?</label>
        <input type="text" name="prenom_utilisateur">

        <label for="mail_utilisateur">quel est ton e-mail ?</label>
        <input type="mail" name="mail_utilisateur">

        <label for="password_utilisateur">choisis un mot de passe !</label>
        <input type="password" name="password_utilisateur">

        <input type="submit" value="Ajouter" name="submit">
    </form>
    <div id="error"><?php echo $msg; ?></div>
</body>
</html>