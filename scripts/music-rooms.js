var audio = {
    init : function(){
    	jQuery('#audio_btn').click(function(e){
    		document.getElementById('audio_demo').play();
    	})
    }

}

jQuery(function(){
    audio.init();
})
