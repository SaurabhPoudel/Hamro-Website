<?php

require_once dirname(__FILE__).'/../DataAbstractionLayer/DB.php';

class InvoiceDAL{

    public static function create($e){
        $db = DB::getDB();

        $query = "INSERT INTO invoice (customer_id, staff_id, status_flag) VALUES(:customer_id,:staff_id,:status_flag);";

        $params =
            [
                ':customer_id'=>$e->customer_id,
                ':staff_id'=>$e->staff_id,
                ':status_flag'=>$e->status_flag
            ];

        $res = $db -> query($query, $params);
        if($res){
            $id = $db->lastInsertId();
            return $id;
        } else {
            return false;
        }
    }

    public static function retrieveById($e){
        $db=DB::getDB();
        $query="SELECT * FROM invoice WHERE invoice.id = :id;";

        $params =
            [
                ':id'=> $e->id
            ];

        $res = $db->query($query, $params);
        $res -> setFetchMode(PDO::FETCH_CLASS,"Invoice");
        $row = $res -> fetch();
        $res -> closeCursor();

        if($row){
            $invoice = $row;
            return($invoice);
        }
        return(FALSE);
    }

    public static function retrieveAll(){
        $db=DB::getDB();
        $query="SELECT * FROM invoice;";


        $res = $db -> query($query);
        $res -> setFetchMode(PDO::FETCH_CLASS,"Invoice");

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

    public static function updateStatusFlag($e){
        $db= DB::getDB();
        $query = "UPDATE invoice SET status_flag=:status_flag WHERE id=:id;";

        $params =
            [
                ':status_flag'=>$e->status_flag,
                ':id'=>$e->id
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

    public static function delete($e){
        $db= DB::getDB();
        $query = "DELETE FROM invoice WHERE invoice.id=:id;";

        $params =
            [
                ':id'=> $e->id
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

}

