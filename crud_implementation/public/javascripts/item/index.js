$("div.item-container i.delete-item").click(function(){
    var itemDelete = $(this);
    
    var item = {
        id: itemDelete.attr("id")
    };
    $.ajax({
        type: "POST",
        url: "scripts/item_delete.php",
        data: item,
        success: function(){
            itemDelete.parent().fadeOut("slow");
        },
        error: function(){
            alert("There was an error!");
        } 
    })
});

var itemsCost = 0;
$('.item-buy-btn').click(function(){
    var btn = $(this);
    var form = $('form#shopping-cart div.shopping-items');

    var priceTotal = $('.col-cart p span');

    var itemId = btn.attr('id');
    var itemPrice = btn.attr('price');
    var itemAmount = $('#item-'+itemId+'-amount.item-amount input').val();

    if(parseInt(itemAmount) > 0){
        var item = '<input type="number" name="item['+itemId+'][id]" value="'+itemId+'">'+
            '<input type="number" name="item['+itemId+'][amount]" value="'+itemAmount+'">'+
            '<input type="number" name="item['+itemId+'][price]" value="'+itemPrice+'">';

        form.append(item);
        btn.text("");
        btn.text("Added to cart!");
        btn.attr("disabled", true);

        itemsCost += parseFloat(itemPrice) * parseInt(itemAmount);

        priceTotal.empty();
        priceTotal.append(itemsCost);
    } else {
        alert("You have to specify amount of product, minimum amount is 1!");
    }
});
