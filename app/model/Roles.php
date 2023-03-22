<?php 

namespace app\model;
use app\utils\BddConnect;

    class Roles extends BddConnect {
        
        /************************************
                    Attributs
        ***********************************/
        private $id_role;
        private $name_roles;
        /************************************
                    Constructeur
        ***********************************/
        public function __construct(/*$name*/){
            // $this->id_role=1;
            // $this->name_roles=$name;
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

        /************************************
                    Méthodes
        ***********************************/

        public function addRoles():void{

            try{

                $nom = $this->name_roles;

                $req = $this->connexion()->prepare('INSERT INTO roles (nom_roles) VALUES (?)');

                $req -> bindParam(1,$nom,\PDO::PARAM_STR);

                $req -> execute();
            }
            catch (\Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }
    }



?>