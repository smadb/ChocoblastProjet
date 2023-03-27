<?php 

namespace app\model;
use app\utils\BddConnect;
use app\model\Utilisateur;
use Exception;

    class Chocoblast extends bddConnect {
        
        /************************************
                    Attributs
        ***********************************/
        private ?Utilisateur $cible_chocoblast;
        private ?Utilisateur $auteur_chocoblast;

        private ?int $id_chocoblast;
        private ?string $slogan_chocoblast;
        private ?string $date_chocoblast;
        private ?bool $statut_chocoblast;

        /************************************
                    Constructeur
        ***********************************/
        public function __construct(){
            $this->cible_chocoblast=new Utilisateur;
            $this->auteur_chocoblast=new Utilisateur;
            $this->statut_chocoblast = true;
        }

        /************************************
                    Get / Set
        ***********************************/
        public function getSlogan(){
            return $this->slogan_chocoblast;
        } 
        public function getDate(){
            return $this->date_chocoblast;
        } 
        public function getCible(){
            return $this->cible_chocoblast;
        }
        public function getAuteur(){
            return $this->auteur_chocoblast;
        }
        public function getIdChocoblast(){
            return $this->id_chocoblast;
        }
        public function getStatut(){
            return $this->statut_chocoblast;
        }

        public function setCible($cible){
            $this->cible_chocoblast=$cible;
        }
        public function setAuteur($auteur){
            $this->auteur_chocoblast=$auteur;
        }
        public function setSlogan($slogan){
            $this->slogan_chocoblast=$slogan;
        }
        public function setDate($date){
            $this->date_chocoblast=$date;
        }

        /************************************
                    Méthodes
        ***********************************/
        public function __toString()
        {
            return $this->slogan_chocoblast;
        }
        public function addChocoblast(){

            try{
                
                $ciblechoco = $this->getCible()->getIdUtil();
                $auteurchoco = $this->getAuteur()->getIdUtil();
                $datechoco = $this->getDate();
                $sloganchoco = $this->getSlogan();
                $statut = $this->getStatut();

                 //preparer la requete
                 $req = $this->connexion()->prepare('INSERT INTO chocoblast(slogan_chocoblast,date_chocoblast,cible_chocoblast,auteur_chocoblast,statut_chocoblast) VALUES (?,?,?,?,?)');
                 //bind les parametres
                 $req->bindParam(1,$sloganchoco,\PDO::PARAM_STR);
                 $req->bindParam(2,$datechoco,\PDO::PARAM_STR);
                 $req->bindParam(3,$ciblechoco,\PDO::PARAM_INT);
                 $req->bindParam(4,$auteurchoco,\PDO::PARAM_INT);
                 $req->bindParam(5,$statut,\PDO::PARAM_BOOL);

                
                 //executer la requete
                 $req->execute();
             }
             catch (Exception $e){
                 die('Erreur : '.$e->getMessage());
             }
        }

        // public function getAllChocoblast(int $filter){
        //     $requete = '';
        //     if ($filter==1){

        //     }
        //     elseif ($filter==2){

        //     }
        //     elseif($filter ==3){

        //     }
        //     else{

        //     }
        // }

        public function getChocoblastAll(){
            try{
                
                $req = $this->connexion()->prepare('SELECT id_chocoblast, slogan_chocoblast, date_chocoblast,  nom_auteur, prenom_auteur, nom_cible, prenom_cible FROM chocoblast INNER JOIN vwCible ON cible_chocoblast = vwcible.id_cible 
                INNER JOIN vwAuteur ON auteur_chocoblast = vwauteur.id_auteur ORDER BY date_chocoblast');
                
                $req->execute();
                $data = $req->fetchAll(\PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die();
            }
        }
    }



?>