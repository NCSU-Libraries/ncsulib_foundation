var aud = {
    init : function(){
		aud.ary = ['<i class="fa fa-volume-off" aria-hidden="true"></i>','<i class="fa fa-volume-down" aria-hidden="true"></i>','<i class="fa fa-volume-up" aria-hidden="true"></i>'],
		jQuery('#audio_btn').append(aud.ary[0]);

    	jQuery('#audio_btn').click(function(e){
    		document.getElementById('audio_demo').play();
    		aud.trackPlaying();
    	})
    },

    trackPlaying : function(){
    	audio = document.getElementById('audio_demo');
    	duration = audio.duration;
    	i = 1;


    	var int = setInterval(function(){
    		currentTime = audio.currentTime;
    		console.log(i);

    		if(currentTime < duration){
    			jQuery('#audio_btn i').remove();
    			jQuery('#audio_btn').append(aud.ary[i]);
    			i++;

    			if(i==aud.ary.length){
    				i = 0;
    			}
    		} else{
    			jQuery('#audio_btn i').remove();
    			jQuery('#audio_btn').append(aud.ary[0]);
    			clearInterval(int);
    		}
    	}, 333)
    }

}

jQuery(function(){
    aud.init();
})
