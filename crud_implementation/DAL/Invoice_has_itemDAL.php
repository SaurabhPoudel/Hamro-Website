<?php

require_once dirname(__FILE__).'/../DataAbstractionLayer/DB.php';

class Invoice_has_itemDAL{

    public static function create($e){
        $db = DB::getDB();

        $query = "INSERT INTO invoice_has_item (invoice_id, item_id, invoice_price,amount) VALUES(:invoice_id, :item_id, :invoice_price,:amount);";

        $params =
            [
                ':invoice_id'=>$e->invoice_id,
                ':item_id'=>$e->item_id,
                ':invoice_price'=>$e->invoice_price,
                ':amount'=>$e->amount,
            ];

        $res = $db -> query($query, $params);
        return($res);
    }


    public static function retrieveAll(){
        $db=DB::getDB();
        $query="SELECT * FROM invoice_has_item;";


        $res = $db -> query($query);
        $res -> setFetchMode(PDO::FETCH_CLASS,"Invoice_has_item");

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

    public static function update($e){
        $db= DB::getDB();
        $query = "UPDATE invoice_has_item SET item_id=:item_id WHERE invoice_id=:invoice_id;";

        $params =
            [
                ':item_id'=>$e->item_id,
                ':invoice_id'=>$e->invoice_id
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

    public static function delete($e){
        $db= DB::getDB();
        $query = "DELETE FROM invoice_has_item WHERE invoice_has_item.invoice_id=:invoice_id;";

        $params =
            [
                ':invoice_id'=> $e->invoice_id
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

}

