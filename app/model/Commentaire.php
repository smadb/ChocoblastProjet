<?php 
namespace app\model;
use app\utils\BddConnect;
use app\model\Chocoblast;
use app\model\Utilisateur;
use Exception;
    class Commentaire extends BddConnect {
        
        /************************************
                    Attributs
        ***********************************/
        private ?int $id_commentaire;
        private ?int $note_commentaire;
        private ?string $texte_commentaire;
        private ?string $date_commentaire;
        private ?bool $statut_commentaire;
        private ?Chocoblast $id_chocoblast;
        private ?Utilisateur $auteur_commentaire;

        /************************************
                    Constructeur
        ***********************************/
        public function __construct(){
            $this->id_chocoblast= new Chocoblast;
            $this->auteur_commentaire=new Utilisateur;
            $this->statut_commentaire=true;
        }
        /************************************
                    Get / Set
        ***********************************/
        public function getIdCom():?int{
            return $this->id_commentaire;
        }public function getNoteCom():?int{
            return $this->note_commentaire;
        }public function getTexteCom():?string{
            return $this->texte_commentaire;
        }public function getDateCom():?string{
            return $this->date_commentaire;
        }public function getStatutCom():?bool{
            return $this->statut_commentaire;
        }public function getIdChoco():?Chocoblast{
            return $this->id_chocoblast;
        }public function getAuteurCom():?Utilisateur{
            return $this->auteur_commentaire;
        }

        public function setIdCom(int $id):void{
            $this->id_commentaire=$id;
        }
        public function setNoteCom(int $note){
            $this->note_commentaire=$note;
        }
        public function settexteCom(string $texte){
            $this->texte_commentaire=$texte;
        }
        public function setDateCom(string $date){
            $this->date_commentaire=$date;
        }
        public function setStatutCom(bool $statut){
            $this->statut_commentaire=$statut;
        }
        public function setChocoblastCom(Chocoblast $choco){
            $this->id_chocoblast=$choco;
        }
        public function setAuteurCom(Utilisateur $auteur){
            $this->auteur_commentaire=$auteur;
        }

        /************************************
                   Méthodes
        ***********************************/
        public function addCommentaire(){
            try{
                $id = $this->getIdCom();
                $notecom = $this->getNoteCom();
                $textecom = $this->getTexteCom();
                $datecom = $this->getDateCom();
                $idchocoblast = $this->getIdChoco()->getIdChocoblast();
                $auteurcom = $this->getAuteurCom()->getIdUtil();
                $statut =$this->getStatutCom();

                 //preparer la requete
                 $req = $this->connexion()->prepare('INSERT INTO commentaire(id_commentaire,note_commentaire,date_commentaire,texte_commentaire,statut_commentaire,auteur_commentaire,id_chocoblast) VALUES (?,?,?,?,?,?,?)');
                 //bind les parametres
                 $req->bindParam(1,$id,\PDO::PARAM_INT);
                 $req->bindParam(2,$notecom,\PDO::PARAM_INT);
                 $req->bindParam(3,$datecom,\PDO::PARAM_STR);
                 $req->bindParam(4,$textecom,\PDO::PARAM_STR);
                 $req->bindParam(5,$statut,\PDO::PARAM_BOOL);
                 $req->bindParam(6,$auteurcom,\PDO::PARAM_INT);
                 $req->bindParam(7,$idchocoblast,\PDO::PARAM_INT);

                 //executer la requete
                 $req->execute();
             }
             catch (Exception $e){
                 die('Erreur : '.$e->getMessage());
             }
        
        }


    }



?>