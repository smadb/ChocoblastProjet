<?php
    use app\controller\UserController;
    use app\controller\RolesController;

    include './app/utils/BddConnect.php';
    include './app/utils/Fonctions.php';
    include './app/model/Utilisateur.php';
    include './app/controller/userController';
    include './app/model/Roles.php';
    include './app/controller/RolesController.php';

    

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //instance des controllers
    //routeur
    $UserController=new UserController();
    $RolesController=new RolesController();

    switch ($path) {
        case '/ChocoProj/':
            include './app/vue/home.php';
            break;
        case '/ChocoProj/addUser':
            $UserController->insertUser();
            break;
        case '/ChocoProj/addRoles':
            $RolesController->insertRoles();
            break;
        default:
            include './app/vue/error.php';
            break;
    }
?>