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
        public function setIdRole($id){
            $this-> id_role=$id;
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

        public function getRolesByName():?array{
            try{
                //Récupération des valeurs de l'objet
                $nom = $this->name_roles;
                //Préparation de la requête
                $req = $this->connexion()->prepare('SELECT id_roles, nom_roles FROM roles
                WHERE nom_roles = ?');
                $req->bindParam(1, $nom, \PDO::PARAM_STR);
                //Exécution de la requête
                $req->execute();
                //Récupération du résultat dans un tableau d'objet
                $data = $req->fetchAll(\PDO::FETCH_OBJ);
                //Retour d'un tableau d'objet ou null
                return $data;
            } 
            catch(\Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

         public function __toString()
                {
                    return $this->name_roles;
                }
    }
       


?>