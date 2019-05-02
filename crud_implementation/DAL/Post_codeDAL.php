<?php

require_once dirname(__FILE__).'/../DataAbstractionLayer/DB.php';

class Post_codeDAL{

    public static function create($e){
        $db = DB::getDB();

        $query = "INSERT INTO post_code (code, city) VALUES(:code, :city);";

        $params =
            [
                ':code'=>$e->code,
                ':city'=>$e->city
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

    public static function retrieveById($e){
        $db=DB::getDB();
        $query="SELECT * FROM post_code WHERE post_code.id = :id;";

        $params =
            [
                ':id'=> $e->id
            ];

        $res = $db->query($query, $params);
        $res -> setFetchMode(PDO::FETCH_CLASS,"Post_code");
        $row = $res -> fetch();
        $res -> closeCursor();

        if($row){
            $post_code = $row;
            return($post_code);
        }
        return(FALSE);
    }

    public static function retrieveAll(){
        $db=DB::getDB();
        $query="SELECT * FROM post_code;";


        $res = $db -> query($query);
        $res -> setFetchMode(PDO::FETCH_CLASS,"");

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
        $query = "UPDATE post_code SET code=:code WHERE id=:id;";

        $params =
            [
                ':code'=>$e->code,
                ':id'=>$e->id
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

    public static function delete($e){
        $db= DB::getDB();
        $query = "DELETE FROM post_code WHERE post_code.id=:id;";

        $params =
            [
                ':id'=> $e->id
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

}

