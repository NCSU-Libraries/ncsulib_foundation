var events = {
    init : function(){
        var oldId;
        jQuery('.view-upcoming-events .view-content .views-row').each(function(i){
            id = jQuery(this).find('.event-info h3 a').attr('href');
            console.log(id)
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
