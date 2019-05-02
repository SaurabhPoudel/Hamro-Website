<h1>Index's Page</h1>

<?php
    require_once dirname(__FILE__).'/../../BL/Item.php';

    $items = Item::retrieveAll();

    foreach ($items as $item) {

    echo '<div class="item-container">'
        .'<img class="item-photo" src="'.$item->photo.'">'
        .'<span class="item-name">'.$item->name.'</span>'
        .'<span class="item-price">'.$item->price.'</span>'
        .'<span class="item-amount" id="item-'.$item->id.'-amount">Amount: <input required type="number" min="1" id="spinner"/></span>'
        .'<button price="'.$item->price.'" id="'.$item->id.'" class="item-buy-btn">Buy</button>';
            if(isset($_SESSION['admin_flag'])==1){
        echo '<i id="'.$item->id.'" class="fas fa-trash delete-item"></i>';
      '</div>';
    }

    $itemToRetrieve = new Item();
    $itemToRetrieve->id = 1;
    $item = $itemToRetrieve->retrieveById();
    }