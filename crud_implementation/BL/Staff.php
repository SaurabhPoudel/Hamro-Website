<?php
require_once dirname(__FILE__).'/../DAL/StaffDAL.php';

class Staff{
    public $id;
    public $name;
    public $email;
    public $password;
    public $telephone;
    public $admin_flag;

    public function create() {
        return(StaffDAL::create($this));
    }

    public function delete() {
        return(StaffDAL::delete($this));
    }

    public function update() {
        return(StaffDAL::update($this));
    }

    public static function retrieveAll(){
        return(StaffDAL::retrieveAll());
    }

    public function retrieveById() {
        return(StaffDAL::retrieveById($this));
    }
     public function retrieveByEmail() 
             {
        return(StaffDAL::retrieveByEmail($this));
    }

}
