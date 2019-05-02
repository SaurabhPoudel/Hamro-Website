<?php
require_once dirname(__FILE__).'/../DAL/Invoice_has_itemDAL.php';

class Invoice_has_item{
    public $invoice_id;
    public $item_id;
    public $invoice_price;
    public $amount;

    public function create() {
        return(Invoice_has_itemDAL::create($this));
    }

    public function delete() {
        return(Invoice_has_itemDAL::delete($this));
    }

    public function update() {
        return(Invoice_has_itemDAL::update($this));
    }

    public static function retrieveAll(){
        return(Invoice_has_itemDAL::retrieveAll());
    }
}
