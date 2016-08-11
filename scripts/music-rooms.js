var audio = {
    init : function(){
    	jQuery('#audio_btn').click(function(e){
    		jQuery('#audio_demo').play();
    	})
    }

}

jQuery(function(){
    audio.init();
})
