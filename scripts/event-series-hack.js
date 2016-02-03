var events = {
    init : function(){
        var oldId;
        jQuery('.view-upcoming-events .view-content .views-row,.view-upcoming-events .view-content .event-item').each(function(i){
            id = jQuery(this).find('.event-info h3 a').attr('href');
            if(id === oldId){
                jQuery(this).hide();
            }
            oldId = id;
        })
    }
}


jQuery(function(){
    events.init();
})
