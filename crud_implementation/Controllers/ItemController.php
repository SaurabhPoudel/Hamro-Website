<?php

require_once dirname(__FILE__).'/../BL/Item.php';

class ItemController {
    public $errors = array();

    public static function process(){
        if(isset($_FILES['item_photo']) && isset($_POST['add_item_btn'])){
            self::addItem();
        }
        
        if(isset($_POST['delete_item_btn'])){
            self::deleteItem();
        }
    }
    
    public static function addItem(){
        try {
            $image = static::upload();
            $newItem = new Item();
            $newItem -> name = htmlspecialchars($_POST['item_name']);
            $newItem -> price = $_POST['item_price'];
            $newItem -> photo = $image;
            $result = $newItem->create();
            return($result);
        } catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public static function upload(){
        $target_dir = dirname(__FILE__)."/../upload/item_photos/";
        $target_file = $target_dir.basename($_FILES["item_photo"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["item_photo"]["tmp_name"]);
            if(!$check){
                throw new Exception("File is not an image");
            }

        }
        if ($_FILES["item_photo"]["size"] > 5000000) {
            //echo "Sorry, your file is too large.";
            throw new Exception("File is too large");
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }

        if(move_uploaded_file($_FILES["item_photo"]["tmp_name"], $target_file)) {
            return 'upload/item_photos/'.$_FILES["item_photo"]["name"];
        } else {
            throw new Exception("Sorry, there was an error uploading your file.");
        }
    }
    
    public static function deleteItem(){
      if(  isset($_SESSION['admin_flag'])==1){
        $newItem = new Item();
        //$newItem -> name = $_POST['item_name'];
        
        $newItem ->id = $_POST['item_id'];
        
        $result = $newItem->delete();
        return($result);
    }
    
}
}