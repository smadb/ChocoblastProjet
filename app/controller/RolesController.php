<?php 

namespace app\controller;
use app\model\Roles;
use app\utils\Fonctions;

class RolesController extends Roles{

    public function insertRoles(){
        $msg ='';

        if (isset($_POST['submit'])){
            $nom = Fonctions::cleanInput($_POST['nom_roles']);

            if (!empty($nom)){
                $roles = new Roles();
                $roles -> setNomRoles($nom);
                $roles->addRoles();
                echo '<script>alert(Le role'.$nom.'a été ajouté !)</script>';
            }
        }
        else {
            echo '<script>alert(Remplir le champs role !)</script>';
        }
        include './app/vue/viewAddRoles.php';
    }
}


?>