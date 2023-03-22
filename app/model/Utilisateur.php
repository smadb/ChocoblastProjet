<?php 

namespace app\model;
use app\utils\BddConnect;
use app\model\Roles;
use Exception;

    class Utilisateur extends BddConnect{

        /************************************
                    Attributs
        ***********************************/
        private ?int $id_utilisateur;
        private ?string $name_user;
        private ?string $surname_user;
        private ?string $mail_user;
        private ?string $password_user;
        private $image_user;
        private $status_user;
        private $roles;
        /************************************
                    Constructeur
        ***********************************/
        public function __construct(){
            // $this->roles = new Roles('user');
        }
        /************************************
                    Get / Set
        ***********************************/
        public function getIdUtil(){
            return $this->id_utilisateur;
        }
        public function getNomUtil():?string{
            return $this->name_user;
        }
        public function getPrenomUtil():?string{
            return $this->surname_user;
        }
        public function getMailUtil():?string{
            return $this->mail_user;
        }
        public function getMdpUtil():?string{
            return $this->password_user;
        }
        
        public function setNomUtil($nom):void{
            $this->name_user=$nom;
        }
        public function setPrenomUtil($prenom):void{
            $this->surname_user=$prenom;
        }
        public function setMailUtil($mail):void{
            $this->mail_user=$mail;
        }
        public function setMdpUtil($password):void{
            $this->password_user=$password;
        }

        /********************************************
         METHODES
         *******************************************/

         public function addUser():void{ //Ajouter un user en BDD via formulaire
            try{
                //créer l'objet avec des valeurs recupérées
                $nom=$this->name_user;
                $prenom=$this->surname_user;
                $mail=$this->mail_user;
                $mdp=$this->password_user;
                //preparer la requete
                $req = $this->connexion()->prepare('INSERT INTO utilisateur(nom_utilisateur,prenom_utilisateur,mail_utilisateur,password_utilisateur) VALUES (?,?,?,?)');
                //bind les parametres
                $req->bindParam(1,$nom,\PDO::PARAM_STR);
                $req->bindParam(2,$prenom,\PDO::PARAM_STR);
                $req->bindParam(3,$mail,\PDO::PARAM_STR);
                $req->bindParam(4,$mdp,\PDO::PARAM_STR);
                //executer la requete
                $req->execute();
            }
            catch (Exception $e){
                die('Erreur : '.$e->getMessage());
            }
         }

         public function getUserByMail():?array{
            $mail = $this->mail_user;
            
            try{
                $req = $this->connexion()->prepare('SELECT id_utilisateur,nom_utilisateur,prenom_utilisateur,mail_utilisateur,image_utilisateur,statut_utilisateur,id_roles FROM utilisateur WHERE mail_utilisateur = ?');
                $req -> bindParam(1,$mail,\PDO::PARAM_STR);
                $req->execute();
                $data = $req->fetchAll(\PDO::FETCH_OBJ);
                return $data;
            }

            catch ( \Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        

    }


?>