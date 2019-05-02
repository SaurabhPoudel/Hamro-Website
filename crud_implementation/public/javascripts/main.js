$( document ).ready(function() {
    var flag = true;
    $('#home-btn').click(function(){
        if(flag){
            $('#main-nav-bar').fadeOut('slow');
            flag = false;
        } else {
            $('#main-nav-bar').fadeIn('slow');
            flag = true;
        }    
    });
});

