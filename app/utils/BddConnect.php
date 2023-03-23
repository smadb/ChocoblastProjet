<?php
    namespace App\Utils;
    class BddConnect{
        //fonction connexion BDD
        public function connexion(){
            include './env.php';
            return new \PDO("mysql:host=$host;dbname=$dbname", "$login","$password", 
            array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
    }
?>