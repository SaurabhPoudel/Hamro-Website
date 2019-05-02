<?php


class DB{
    private $conn;
    private static $instance;


    private function __construct(){
        try{



                $this->conn = new PDO("mysql:host=127.0.0.1;port=3306;dbname=test;charset=UTF8",
                "saurabh", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }catch(PDOException $e){
            echo $e ->getMessage();
            exit();
        }
    }

    public static function getDB(){
        if(self::$instance == NULL){
            self::$instance = new DB();
        }
        return(self::$instance);
    }

    public function query($query, $params = []){
        $statement = $this->conn->prepare($query);
        $statement->execute($params);
        return($statement);
    }

    public function lastInsertId(){
        return($this->conn->lastInsertId());
    }
}