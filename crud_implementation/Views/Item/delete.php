<?php
    require_once dirname(__FILE__) . '/../../Controllers/ItemController.php';
    Item_controller::process();
?>

<form id = "new_item_form" method = "post">
    Enter id to delete item: <input type="text" name="item_id"><br>
    
    <input id="new_item_btn" type='submit' name="delete_item_btn" value="Submit">
</form>
