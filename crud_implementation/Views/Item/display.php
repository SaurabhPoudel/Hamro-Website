<?php
    require_once dirname(__FILE__) . '/../../Controllers/ItemController.php';
    Item_controller::process();
?>

<form id = "new_item_form" method = "post">
    Name: <input type="text" name="item_name"><br>
    Price: <input type="text" name="item_price"><br>
    Photo: <input type="text" name="item_photo"><br>
    
    <input id="new_item_btn" type='submit' name="add_item_btn" value="Submit">
</form>
