<?php
require_once dirname(__FILE__).'/../DAL/Post_codeDAL.php';

class Post_code{
    public $id;
    public $code;
    public $city;

    public function create() {
        return(Post_codeDAL::create($this));
    }

    public function delete() {
        return(Post_codeDAL::delete($this));
    }

    public function update() {
        return(Post_codeDAL::update($this));
    }

    public static function retrieveAll(){
        return(Post_codeDAL::retrieveAll());
    }

    public function retrieveById() {
        return(Post_codeDAL::retrieveById($this));
    }

}
