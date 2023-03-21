<?php 

namespace app\model;
use app\utils\bddConnect;
use app\model\Roles;

    class Utilisateur{

        /************************************
                    Attributs
        ***********************************/
        private $id_utilisateur;
        private $name_user;
        private $surname_user;
        private $mail_user;
        private $image_user;
        private $status_user;
        private $roles;
        /************************************
                    Constructeur
        ***********************************/
        public function __construct(){
            $this->roles = new Roles('user');
        }
        /************************************
                    Get / Set
        ***********************************/
        public function getIdUtil(){
            return $this->id_utilisateur;
        }
        public function getNomUtil(){
            return $this->name_user;
        }
        public function getPrenomUtil(){
            return $this->surname_user;
        }
        public function getMailUtil(){
            return $this->mail_user;
        }
        public function getImageUtil(){
            return $this->image_user;
        }
        public function getStatutUtil(){
            return $this->status_user;
        }
        public function getRolesUtil(){
            return $this->roles;
        }
    }



?>