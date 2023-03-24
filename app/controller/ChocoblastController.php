<?php 

namespace app\controller;
use app\model\Chocoblast;
use app\model\Utilisateur;
use app\utils\Fonctions;

class ChocoblastController extends Chocoblast{

    public function insertChocoblast():void{
        
        $msg='';

        if(isset($_SESSION['connected'])){

            $user = new Utilisateur;
            $data = $user->getUserAll();

            if (isset($_POST['submit'])){
            $slogan = Fonctions::cleanInput($_POST['slogan_chocoblast']);
            $date = Fonctions::cleanInput($_POST['date_chocoblast']);
            $cible = Fonctions::cleanInput($_POST['cible_chocoblast']);
            $auteur = $_SESSION['id'];

                if(!empty($slogan)&& !empty($date) && !empty($cible) && !empty($auteur)){
                    $this->setSlogan($slogan);
                    $this->setDate($date);
                    $this->getCible()->setIdUtil($cible);
                    $this->getAuteur()->setIdUtil($auteur);


                    $this->addChocoblast();
                    $msg='Chocoblast envoyé !';
                }   

                else{
                    $msg='Remplir les champs';
                }
            

        }
        }
        else{
            header('location: ./');
        } 
        
        


        include './app/vue/viewAddChocoblast.php';
    }

    public function showCoblast(){
        $chocoblast = new Chocoblast;
        $data = $chocoblast->getChocoblastAll();
        $this->getChocoblastAll();

        include './app/vue/showAllChocoblast.php';
    }

    
    // public function addChocoblast(){

    //     if (isset($_POST['submit'])){
    //         $cible=Fonctions::cleanInput($_POST['cible_chocoblast']);
    //         $auteur=Fonctions::cleanInput($_POST['auteur_chocoblast']);
    //         $date=Fonctions::cleanInput($_POST['date_chocoblast']);
    //         $slogan=Fonctions::cleanInput($_POST['slogan_chocoblast']);
    //     }
        
    //     include './app/vue/viewAddChocoblast.php';
    // }
    

}
    


?>