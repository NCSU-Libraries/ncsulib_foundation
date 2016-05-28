var events = {
    init : function(){
        var oldId;
        var id = '';
        jQuery('.view-upcoming-events.view-display-id-page_2 .view-content .views-row').each(function(i){
            id = jQuery(this).find('.event-info h3 a').attr('href');
            if(id === oldId){
                jQuery(this).hide();
            }
            oldId = id;
        })

        jQuery('.view-upcoming-events.view-display-id-block_3 .view-content .event-item.item').each(function(i){
            id = jQuery(this).find('.event-info h3 a').attr('href');
            if(id === oldId){
                jQuery(this).hide();
            }
            oldId = id;
        })
    }
}


jQuery(function(){
    // events.init();
})
