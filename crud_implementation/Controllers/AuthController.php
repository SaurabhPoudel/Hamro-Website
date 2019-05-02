<?php
require_once dirname(__FILE__).'/../BL/Customer.php';

class AuthController {
    public $errors = array();

    public static function process(){
        if(isset($_POST['customer_submit'])){
            if(self::isAuthenticated()){
                header("Location:index.php");
            }
            else{
              return [
                    'type' => 'error',
                    'message' => 'Wrong password or username!',
                ];
            } 
        }

        if(isset($_POST['customer_signup'])){
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
        $c = new Customer();
        $c->email = $_POST['customer_email'];
        $c->password = $_POST['customer_password'];
        if($r = $c->retrieveByEmail()){
           if(self::isValidPassword($r)){
               return self::addCredentials($r);
           }else{
               return false;
           }
        } else {
            return false;
        }
    }

    private static function isValidPassword($c){
        $password = htmlspecialchars($_POST['customer_password']);
        return  md5($password) === $c->password;
    }

    private static function addCredentials($c){
        $_SESSION['customer_id'] = $c->id;
        $_SESSION['email'] = $c->email;
    

        return true;
    }


    private static function localSignup(){
        $c = new Customer();
        $c -> name = $_POST['customer_name'];
        $c -> post_code_id = $_POST['customer_post_code_id'];
        $c -> street = $_POST['customer_street'];
        $c -> credits = 0.0;
        $c -> telephone = $_POST['customer_telephone'];
        $c -> email = $_POST['customer_email'];
        $c -> password = md5($_POST['customer_password']);

        $c -> create();
        if($c){
            return true;
        }else {
            throw new Exception("Customer has been not created!");
        }
    }

    private static function localSignout(){
        if(isset($_SESSION['email'])){
            $_SESSION['email'] = false;
           

            session_destroy();
            return true;
        } else {
            return false;
        }
    }
}
