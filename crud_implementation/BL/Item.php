<?php
require_once dirname(__FILE__).'/../DAL/ItemDAL.php';

class Item{
    public $id;
    public $name;
    public $price;
    public $photo;

    public function create() {
        return(ItemDAL::create($this));
    }

    public function delete() {
        return(ItemDAL::delete($this));
    }

    public function update() {
        return(ItemDAL::update($this));
    }

    public static function retrieveAll(){
        return(ItemDAL::retrieveAll());
    }

    public function retrieveById() {
        return(ItemDAL::retrieveById($this));
    }

}
