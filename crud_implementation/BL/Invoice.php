<?php
require_once dirname(__FILE__).'/../DAL/InvoiceDAL.php';

class Invoice{
    public $id;
    public $customer_id;
    public $staff_id;
    public $date;
    public $status_flag;

    public function create() {
        return(InvoiceDAL::create($this));
    }

    public function delete() {
        return(InvoiceDAL::delete($this));
    }

    public function updateStatusFlag() {
        return(InvoiceDAL::updateStatusFlag($this));
    }

    public static function retrieveAll(){
        return(InvoiceDAL::retrieveAll());
    }

    public function retrieveById() {
        return(InvoiceDAL::retrieveById($this));
    }

}
