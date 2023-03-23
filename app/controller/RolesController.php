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
                if($this->getRolesByName()){
                    $msg = "Le role : ".$nom." existe déja en BDD";
                }
                //Test si il n'existe pas 
                else{
                    //Ajouter en BDD le nouveau role
                    $roles->addRoles();
                    //Afficher la confirmation
                    $msg = "Le role : ".$nom." à été ajouté en BDD";
                }
            }
        }
            else {
                $msg = "Veuillez remplir les champs de formulaire";        
            }

        include './app/vue/viewAddRoles.php';
    }
}


?>