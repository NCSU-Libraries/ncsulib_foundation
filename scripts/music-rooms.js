var audio = {
    init : function(){
    	jQuery('#audio_demo').click(function(e){
    		jQuery(this).play();
    	})
    }

}

jQuery(function(){
    audio.init();
})
