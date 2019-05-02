<?php

require_once dirname(__FILE__).'/../BL/Invoice.php';
require_once dirname(__FILE__).'/../BL/Customer.php';
require_once dirname(__FILE__).'/../BL/Invoice_has_item.php';

class InvoiceController {
    public $errors = array();

    public static function process(){
        if(isset($_POST['btn-pay-invoice'])){
            try {
                if(self::createInvoice()){
                    return [
                        'type' => 'success',
                        'message' =>'Invoice has been created'
                       
                    ];
                }
            } catch (Exception $e){
                return [
                    'type' => 'error',
                    'message' => $e->getMessage()
                ];
            }
        }
    }

    public static function createInvoice(){
        if(isset($_SESSION['customer_id'])){
            $totalInvoice = 0.0;

            $newInvoice = new Invoice();
            $customerId = $_SESSION['customer_id'];
            $newInvoice->customer_id = $customerId;
            $newInvoice->status_flag = 0;
            $invoiceId = $newInvoice->create();

            foreach($_POST['item'] as $id => $val){
                $item = $val;
                 $ihi = new Invoice_has_item();
                $ihi->invoice_id = $invoiceId;
                $ihi->item_id = $item['id'];
                $ihi->invoice_price = $item['price'];
                $ihi->amount = $item['amount'];
 
                $ihi->create();

                $totalInvoice += floatval($item['price']) * intval($item['amount']);
            }

            $customerToFind = new Customer();
            $customerToFind->id = $customerId;
            $finalCustomer = $customerToFind->retrieveById();
            $customerCredits = $finalCustomer->credits;
            echo '<a>your credit is</a> ';
            echo $customerCredits;

            if(floatval($customerCredits) > $totalInvoice){
                $customerToUpdate = new Customer();
                $customerToUpdate->id = $customerId;
                $customerToUpdate->credits = floatval($customerCredits) - floatval($totalInvoice);
                $customerToUpdate->updateCredits();
                $invoiceToUpdate = new Invoice();
                $invoiceToUpdate->id = $invoiceId;
                $invoiceToUpdate->status_flag = 1;
                $invoiceToUpdate->updateStatusFlag();

                return true;
            } else {
                $invoiceToDelete = new Invoice();
                $invoiceToDelete->id = $invoiceId;

                if($invoiceToDelete->delete()){
                    throw new Exception("You don't have enought credits to pay!");
                }else {
                    throw new Exception("Delete error!");
                }
            }
            
        } else {
            throw new Exception("Customer is not logged in!");
        }
    }
}
