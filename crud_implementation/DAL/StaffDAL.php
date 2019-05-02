<?php

require_once dirname(__FILE__).'/../DataAbstractionLayer/DB.php';

class StaffDAL{

    public static function create($e){
        $db = DB::getDB();

        $query = "INSERT INTO staff (name, email, password, telephone, admin_flag) VALUES(:name, :email, :password, :telephone, :admin_flag);";

        $params =
            [
                ':name'=>$e->name,
                ':email'=>$e->email,
                ':password'=>$e->password,
                ':telephone'=>$e->telephone,
                ':admin_flag'=>$e->admin_flag
            ];

        $res = $db -> query($query, $params);
        return($res);
    }
 public static function retrieveByEmail($e){
        $db=DB::getDB();
        $query="SELECT * FROM staff WHERE staff.email = :email;";

        $params =
            [
                ':email'=> $e->email,
            ];

        $res = $db->query($query, $params);
        $res -> setFetchMode(PDO::FETCH_CLASS,"Staff");
        $row = $res -> fetch();
        $res -> closeCursor();

        if($row){
            $staff = $row;
            return($staff);
        }
        return(FALSE);
    }

    public static function retrieveById($e){
        $db=DB::getDB();
        $query="SELECT * FROM staff WHERE staff.id = :id;";

        $params =
            [
                ':id'=> $e->id
            ];

        $res = $db->query($query, $params);
        $res -> setFetchMode(PDO::FETCH_CLASS,"Staff");
        $row = $res -> fetch();
        $res -> closeCursor();

        if($row){
            $staff = $row;
            return($staff);
        }
        return(FALSE);
    }

    public static function retrieveAll(){
        $db=DB::getDB();
        $query="SELECT * FROM staff;";


        $res = $db -> query($query);
        $res -> setFetchMode(PDO::FETCH_CLASS,"Staff");

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
        $query = "UPDATE staff SET name=:name WHERE id=:id;";

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
        $query = "DELETE FROM staff WHERE staff.id=:id;";

        $params =
            [
                ':id'=> $e->id
            ];

        $res = $db -> query($query, $params);
        return($res);
    }

}

