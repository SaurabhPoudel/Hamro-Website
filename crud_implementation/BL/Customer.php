<?php
require_once dirname(__FILE__).'/../DAL/CustomerDAL.php';

class Customer{
    public $id;
    public $name;
    public $post_code_id;
    public $street;
    public $credits;
    public $telephone;
    public $email;
    public $password;

    public function create() {
        if($this->isValid()){
            return CustomerDAL::create($this);
        } else {
            throw new Exception("Registration unsuccessful! This email is already used, please try a new one.");
        }
    }

    private function isValid(){
        if($this->retrieveByEmail()){
            return false;
        }else {
            return true;
        }
    }

    public function delete() {
        return(CustomerDAL::delete($this));
    }

    public function updateCredits() {
        return(CustomerDAL::updateCredits($this));
    }

    public static function retrieveAll(){
        return(CustomerDAL::retrieveAll());
    }

    public function retrieveById() {
        return(CustomerDAL::retrieveById($this));
    }

    public function retrieveByEmail() {
        return(CustomerDAL::retrieveByEmail($this));
    }

    public function retrieveByTelephone() {
        return(CustomerDAL::retrieveByTelephone($this));
    }
}
