<?php
require_once dirname(__FILE__).'/../BL/Item.php';

$item_delete -> id = $_POST["id"];
$item_delete ->delete();
