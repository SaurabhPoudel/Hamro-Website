<?php

require_once dirname(__FILE__).'/../DataAbstractionLayer/DB.php';

class CustomerDAL{

    public static function create($e){
        $db = DB::getDB();

        $query = "INSERT INTO customer (name,post_code_id,street,credits,telephone, email, password) VALUES(:name,:post_code_id,:street,:credits,:telephone, :email, :password);";

        $params =
            [
                ':name'=>$e->name,
                ':post_code_id'=>$e->post_code_id,
                ':street'=>$e->street,
                ':credits'=>$e->credits,
                ':telephone'=>$e->telephone,
                ':email'=>$e->email,
                ':password'=>$e->password
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

    public static function retrieveById($e){
        $db=DB::getDB();
        $query="SELECT * FROM customer WHERE customer.id = :id;";

        $params =
            [
                ':id'=> $e->id
            ];

        $res = $db->query($query, $params);
        $res -> setFetchMode(PDO::FETCH_CLASS,"Customer");
        $row = $res -> fetch();
        $res -> closeCursor();

        if($row){
            $customer = $row;
            return($customer);
        }
        return(FALSE);
    }

    public static function retrieveByEmail($e){
        $db=DB::getDB();
        $query="SELECT * FROM customer WHERE customer.email = :email;";

        $params =
            [
                ':email'=> $e->email
            ];

        $res = $db->query($query, $params);
        $res -> setFetchMode(PDO::FETCH_CLASS,"Customer");
        $row = $res -> fetch();
        $res -> closeCursor();

        if($row){
            $customer = $row;
            return($customer);
        }
        return(FALSE);
    }

    public static function retrieveByTelephone($e){
        $db=DB::getDB();
        $query="SELECT * FROM customer WHERE customer.telephone = :telephone;";

        $params =
            [
                ':telephone'=> $e->telephone
            ];

        $res = $db->query($query, $params);
        $res -> setFetchMode(PDO::FETCH_CLASS,"Customer");
        $row = $res -> fetch();
        $res -> closeCursor();

        if($row){
            $customer = $row;
            return($customer);
        }
        return(FALSE);
    }

    public static function retrieveAll(){
        $db=DB::getDB();
        $query="SELECT * FROM customer;";


        $res = $db -> query($query);
        $res -> setFetchMode(PDO::FETCH_CLASS,"Customer");

        $array = array();

        while($row = $res -> fetch()){
            $array[] = $row;
        }
        $res -> closeCursor();

        if(isset($array)){
            return($array);
        } else {
            $return = FALSE;
        }

        return $return;
    }

    public static function updateCredits($e){
        $db= DB::getDB();
        $query = "UPDATE customer SET credits=:credits WHERE id=:id;";

        $params =
            [
                ':credits'=>$e->credits,
                ':id'=>$e->id
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

    public static function delete($e){
        $db= DB::getDB();
        $query = "DELETE FROM customer WHERE customer.id=:id;";

        $params =
            [
                ':id'=> $e->id
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

}

