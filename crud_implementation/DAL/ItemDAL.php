<?php

require_once dirname(__FILE__).'/../DataAbstractionLayer/DB.php';

class ItemDAL{

    public static function create($e){
         $db = DB::getDB();
        $query = "INSERT INTO item (name,price,photo) VALUES(:name,:price,:photo);";

        $params =
            [
                ':name'=>$e->name,
                ':price'=>$e->price,
                ':photo'=>$e->photo
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

    public static function retrieveById($e){
        $db=DB::getDB();
        $query="SELECT * FROM item WHERE item.id = :id;";

        $params =
            [
                ':id'=> $e->id
            ];

        $res = $db->query($query, $params);
        $res -> setFetchMode(PDO::FETCH_CLASS,"Item");
        $row = $res -> fetch();
        $res -> closeCursor();

        if($row){
            $item = $row;
            return($item);
        }
        return(FALSE);
    }

    public static function retrieveAll(){
        $db=DB::getDB();
        $query="SELECT * FROM item;";


        $res = $db -> query($query);
        $res -> setFetchMode(PDO::FETCH_CLASS,"Item");

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
        $query = "UPDATE item SET name=:name WHERE id=:id;";

        $params =
            [
                ':name'=>$e->name,
                ':id'=>$e->id
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

    public static function delete($e){
        $db= DB::getDB();
       
        $query = "DELETE FROM item WHERE item.id=:id;";

        $params =
            [
                ':id'=> $e->id
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

}

