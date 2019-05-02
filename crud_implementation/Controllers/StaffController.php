<?php
require_once dirname(__FILE__).'/../BL/Staff.php';



class StaffController{
    public $errors = array();

    public static function process(){
        
        if(isset($_POST['staff_submit'])){
            if(self::isAuthenticated()){
                header("Location: index.php");
            }
            else{
              return [
                    'type' => 'error',
                    'message' => 'Wrong password or username!'
                ];
            } 
        }
        
        if(isset($_POST['staff_signup'])){
            try {
                if(self::localSignup()){
                    header("Location: index.php?page=site/thankyou");
                }else{
                    return [
                    'type' => 'error',
                    'message' => 'Error!'   
                    ];
                }
            } catch (Exception $e){
                return
                    [
                        'type' => 'error',
                        'message' => $e->getMessage()
                    ];
            }
        }

        if(isset($_GET['logout'])){
            $res = self::localSignout();

            if($res){
                header("Location: index.php?page=site/login");
            } else {
                header("Location: index.php");
            }
        }
    }

    private static function isAuthenticated(){
        $s = new Staff();
        $s->email = $_POST['staff_email'];
        $s->password = $_POST['staff_password'];
        if($t = $s->retrieveByEmail()){
           if(self::isValidPassword($t)){
               return self::addCredentials($t);
           }else{
               return false;
           }
        } else {
            return false;
        }
    }

    private static function isValidPassword($s){
        $password = htmlspecialchars($_POST['staff_password']);
        return  md5($password) === $s->password;
    }

    private static function addCredentials($s){
        $_SESSION['staff_id'] = $s->id;
        $_SESSION['email'] = $s->email;
        $_SESSION['admin_flag']=$s->admin_flag;
    

        return true;
    }


    private static function localSignup(){
        $s = new Staff();
        $s -> name = $_POST['staff_name'];
        $s-> telephone = $_POST['staff_telephone'];
        $s-> email = $_POST['staff_email'];
        $s -> password = md5($_POST['staff_password']);
        $s->admin_flag=0;
        $s -> create();
        if($s){
            return true;
        }else {
            throw new Exception("Staff has been not created!");
        }
    }

    private static function localSignout(){
        if(isset($_SESSION['email'])){
            $_SESSION['email'] = false;
            $_SESSION['role']=false;
           

            session_destroy();
            return true;
        } else {
            return false;
        }
    }
}
