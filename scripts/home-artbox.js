var orb = {
	 init : function($){
	 	var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
		if(width > 768){ //desktop
			orb.desktopSlider();
		} else{ //mobile
			orb.mobileSlider();
		}

	 },

	 desktopSlider : function(){
	 	jQuery(document).foundation({
	    	orbit: {
	      		timer_show_progress_bar: false,
				animation: 'fade',
	      		slide_number: false,
	      		animation_speed: 300,
	      		timer_speed: 7000
	    	}
	  	})

	},

	mobileSlider : function(){
		jQuery(document).foundation({
			orbit: {
	      		timer_show_progress_bar: false,
				animation: 'fade',
	      		slide_number: false,
	      		animation_speed: 200,
	      		timer_speed: 7000
	    	}
	  	})

	  	// fire resize event so mobile registers mobile height
		jQuery(window).resize();
	}
}



jQuery(document).ready(function($){

	orb.init();

});
