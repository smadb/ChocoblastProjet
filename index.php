<?php
    //demarrage session
    session_start();

    
    use app\controller\UserController;
    use app\controller\RolesController;
    use app\controller\ChocoblastController;

    include './app/utils/BddConnect.php';
    include './app/utils/Fonctions.php';
    include './app/model/Utilisateur.php';
    include './app/controller/UserController.php';
    include './app/model/Roles.php';
    include './app/controller/RolesController.php';
    include './app/model/Chocoblast.php';
    include './app/controller/ChocoblastController.php';

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //instance des controllers
    //routeur
    $UserController=new UserController();
    $RolesController=new RolesController();
    $ChocoblastController=new ChocoblastController();

    switch ($path) {
        case '/ChocoProj/':
            include './app/vue/home.php';
            break;
        case '/ChocoProj/userAdd':
            $UserController->insertUser();
            break;
        // case '/ChocoProj/rolesAdd':
        //     $RolesController->insertRoles();
        //     break;
        case '/ChocoProj/connexion':
            $UserController->connexionUser();
            break;
        case '/ChocoProj/deconnexion':
            $UserController->decoUser();
            break;
        case '/ChocoProj/chocoblastAdd':
            $ChocoblastController->insertChocoblast();
            break;
        case '/ChocoProj/chocoblastShow':
            $ChocoblastController->showCoblast();
            break;
        default:
            include './app/vue/error.php';
            break;
    }
?>