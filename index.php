<?php
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //instance des controllers
    //routeur
    switch ($path) {
        case '/ChocoProj/':
            include './app/vue/home.php';
            break;
        case '/ChocoProj/addUser':
            include './app/vue/viewAddUser.php';
        default:
            include './app/vue/error.php';
            break;
    }
?>