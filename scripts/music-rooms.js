var music = {
    init : function(){

        jQuery('a[data-reveal-id]').mouseover(function(e){
            jQuery(this).trigger('click');

            e.preventDefault();
        })

        $(".accordion").on("click", "li", function (event) {
 			$("div.active").slideToggle("slow");
 			$(this).find(".content").slideToggle("slow");
 		});
    }
}


jQuery(function(){
    music.init();
})
