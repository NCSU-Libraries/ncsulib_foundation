var music = {
    init : function(){

        jQuery('a[data-reveal-id]').mouseover(function(e){
            jQuery(this).trigger('click');
            console.log($(this));
        })
    }
}


jQuery(function(){
    music.init();
})
