<?php
    require_once dirname(__FILE__).'/../../Controllers/ItemController.php';
    try {
        ItemController::process();
    } catch(Exception $e) {
        echo 'ERROR!: '.$e->getMessage();
    }
?>

<div class="form-container">
    <h2 class="form-heading">New Item</h2>
    <form class="custom-form" method="post" enctype="multipart/form-data">
        <label for="iname">Name</label>
        <input type="text" id="iname" name="item_name" placeholder="Item name..">

        <label for="iprice">Price</label>
        <input type="text" id="iprice" name="item_price" placeholder="Item price...">

        <label for="iphoto">Photo</label>
        <input type="file" name="item_photo" id="iphoto">
        <input type="submit" name="add_item_btn" value="Submit">
    </form>
</div>