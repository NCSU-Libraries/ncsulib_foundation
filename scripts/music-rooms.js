var music = {
    init : function(){

        jQuery('a[data-reveal-id]').mouseover(function(e){
            jQuery(this).trigger('click');

            e.preventDefault();
        })
    }
}


jQuery(function(){
    music.init();
})
