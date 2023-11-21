<?php
class Database{
    // Connexion à la base de données, on va pouvoir instanciés cette classe a chaque fois qu'on va vouloir se conn a la BD
    private $host = "localhost";
    private $db_name = "api_rest";
    private $username = "root";
    private $password = "";
    public $connexion;// public puisque je dois pouvoir y acceder depuis un une autre classe

    // getter pour la connexion
    public function getConnection(){

        $this->connexion = null;

        try{
            $this->connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->connexion->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->connexion;
    }   
}