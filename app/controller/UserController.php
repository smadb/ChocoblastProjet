<?php 

namespace app\controller;
use app\model\Utilisateur;
use app\utils\Fonctions;

class UserController extends Utilisateur{

    //fonction qui gere l'ajout d'un utilisateur en bdd
    public function insertUser(){
        //variable pour message d'erreur
        $msg='';
        //logique
        if (isset($_POST['submit'])){

            // clean les données recup avec la fonction de la page fonctions
            $nom=Fonctions::cleanInput($_POST['nom_utilisateur']);
            $prenom=Fonctions::cleanInput($_POST['prenom_utilisateur']);
            $mail=Fonctions::cleanInput($_POST['mail_utilisateur']);
            $mdp=Fonctions::cleanInput($_POST['password_utilisateur']);

            //tester si les champs sont remplis
            if (!empty($nom) && !empty($prenom) && !empty($mail) && !empty($mdp)){

                $user = new Utilisateur();
                //recup le mail dans un obj
                $user->setMailUtil($mail);
                //tester si le compte existe
                if($user->getUserByMail()){
                    $msg='Les infos sont incorrectes';
                }
                else{
                    $mdp = password_hash($mdp,PASSWORD_DEFAULT);
                    $user->setNomUtil($nom);
                    $user->setPrenomUtil($prenom);
                    $user->setMdpUtil($mdp);

                $user -> addUser();
                echo $msg = '<script>alert(Le compte'.$mail.'a été ajouté !)</script>'; 
                }

                
            }
            else{

                echo $msg='<script> alert(Veuillez remplir les champs !)</script>';
                
            }
        }
        //importer la vue
        include './app/vue/viewAddUser.php';
    }



    public function connexionUser(){
        $msg='';
        if(isset($_POST['submit'])){
            $mail=Fonctions::cleanInput($_POST['mail_utilisateur']);
            $password=Fonctions::cleanInput($_POST['password_utilisateur']);

            if(!empty($mail)&& !empty($password)){

                $user = new Utilisateur();
                $user->setMailUtil($mail);
                $user->setMdpUtil($password);

                if($user->getUserByMail()){
                    
                    $data = $user->getUserByMail();

                    if(password_verify($password, $data[0]->password_utilisateur)){
                        $_SESSION['connected']=true;
                        $_SESSION['mail'] = $data[0]->mail_utilisateur;
                        $_SESSION['id'] = $data[0]->id_utilisateur;
                        $_SESSION['nom']= $data[0]->nom_utilisateur;
                        $_SESSION['prenom']= $data[0]->prenom_utilisateur;
                        $msg='';

                    }
                    else{
                        $msg= "le mot de passe ne correspond pas";
                    }
                }
                else{
                    $msg="le compte n'existe pas";
                }
                
            }
            else{
                $msg="remplir tout les champs";
            }
        }
        else{
            $msg="appuyer sur submit";
        }
        
        include './app/vue/viewConnexion.php';
    }
}



?>