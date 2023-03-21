<?php 

namespace app\model;
use app\utils\bddConnect;

    class Roles extends bddConnect {
        
        /************************************
                    Attributs
        ***********************************/
        private $id_role;
        private $name_roles;
        /************************************
                    Constructeur
        ***********************************/
        public function __construct($name){
            $this->id_role=1;
            $this->name_roles=$name;
        }
        /************************************
                    Get / Set
        ***********************************/
        public function getIdRole(){
            return $this->id_role;
        }
        public function getNomRoles(){
            return $this->name_roles;
        }

        public function setNomRoles($name){
            $this->name_roles=$name;
        }
    }



?>