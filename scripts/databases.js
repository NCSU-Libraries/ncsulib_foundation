var db = {
    init : function(){
        db.handleSideNav();
        db.handleDbSort();
    },

    handleSideNav : function(){
        $('.item-list h3').on('click', function(e){

            // //close all navs
            db.closeAllNavItems();
            // $('.subject-list').hide();

            if($(this).hasClass('active')){
                // close item nav
                $(this).removeClass('active');
                $(this).next().slideUp();
            } else{
                // open item nav
                $('.item-list h3').removeClass('active');
                $(this).addClass('active');
                $(this).next().slideDown();
            }

            e.preventDefault();
        })
    },

    handleDbSort : function(){
        $('.subject-list a').on('click', function(e){

            tid = $(this).data('tid');

            // hide all items
            $('.db-list li .db').hide();
            $('.subject-list a').removeClass('selected');

            // only show items clicked on
            $(this).addClass('selected');
            $('.db-list li div.'+tid).show();

            e.preventDefault();
        })
    },

    closeAllNavItems : function(){
        $('.item-list').each(function(i){
            $(this).find('ul').slideUp();
        })
    }
}


jQuery(function(){
    db.init();
})
