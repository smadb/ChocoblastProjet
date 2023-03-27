<?php 

namespace app\controller;
use app\model\Commentaire;
use app\utils\Fonctions;

class CommentaireController extends Commentaire{

    public function insertComment(){
        //variable pour message d'erreur
        $msg='';
        //logique
        if (isset($_POST['submit'])){

            // clean les données recup avec la fonction de la page fonctions
            $texte=Fonctions::cleanInput($_POST['texte_commentaire']);
            $note=Fonctions::cleanInput($_POST['note_commentaire']);

            //tester si les champs sont remplis
            if (!empty($texte) && !empty($note)){

                
                $auteurcom = new Utilisateur();
                $chococom = 
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
        include './app/vue/viewAddCommentaire.php';
    }
}
    ?>