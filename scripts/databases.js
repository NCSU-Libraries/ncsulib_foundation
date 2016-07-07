var db = {
    init : function(){
        db.handleSideNav();
        db.handleDbSort();
        db.handleSearchInput();
    },

    handleSearchInput : function(){
        //run search when a key is pressed in the search box
        $('#db-search-box input').on('keyup',function(e){
            val = $(this).val().toLowerCase();
            var num = 0;
            $('.db-list ul li').each(function(i){
                title = $(this).find('h3 a').text();
                if(title.toLowerCase().indexOf(val) == -1){
                    //hide is not found in string
                    $(this).find('.db').hide();
                } else if(val == '' || val == ' '){ //empty search box
                    $(this).find('.db').hide();
                } else{
                    //show total results with search string
                    num++;
                    //show all db's
                    $(this).find('.db').show();
                }
            })

            //results msg
            if(val == '' || val == ' '){
                $('#db-result').text("Please try a search or choose a category");
            } else if(num == 0){
                $('#db-result').text("We got nothin'. Please retry your search or choose a category");
            } else{
                $('#db-result').text('Showing '+num+' databases for "'+val+'"');
            }

        });
    },

    handleSideNav : function(){
        $('.item-list h3').on('click', function(e){

            var tid = $(this).find('.subject-title').data('tid');
            var target = $(e.target);



            if($(target).hasClass('subject-title')){ //if clicking on term name
                // hide all items
                $('.db-list li .db').hide();
                $('.db-list li div.'+tid).show();
                $('.subject-list a').removeClass('selected');

                if($(this).hasClass('active')){
                    // close item nav
                    $(this).removeClass('active');
                } else{
                    // open item nav
                    $('.item-list h3').removeClass('active');
                    $(this).addClass('active');
                    $('#db-result').text('Showing '+db.getNumVisibleDBs()+' databases for "'+$(this).text().trim()+'"');
                }
            } else if($(target).hasClass('nav-expand')){ //if clicking on expand button
                //close all navs
                $('.subject-list').slideUp();

                if($(target).hasClass('active')){
                    // close item nav
                    $(target).removeClass('active');
                } else{
                    // open item nav
                    $(target).addClass('active');
                    $(target).parent().next().slideDown();
                }
            }

            e.preventDefault();
        })
    },

    handleDbSort : function(){
        $('#db-result').text('Showing '+db.getNumVisibleDBs()+' core databases. Enter a search or choose a category for more.');

        $('.subject-list a').on('click', function(e){

            tid = $(this).data('tid');

            // hide all items
            $('.db-list li .db').hide();
            $('.subject-list a').removeClass('selected');
            $('.item-list h3').removeClass('active');

            // only show items clicked on
            $(this).addClass('selected');
            $('.db-list li div.'+tid).show();

            $('#db-result').text('Showing '+db.getNumVisibleDBs()+' databases for "'+$(this).text().trim()+'"');

            e.preventDefault();
        })
    },

    getNumVisibleDBs : function(){
        return $('.db-list li div:visible').length;//number of visible db's
    }
}


jQuery(function(){
    db.init();
})
