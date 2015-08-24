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
	 	// orb.interval = setInterval('orb.sliderTest()', 3000);

	 	jQuery(document).foundation({
	    	orbit: {
	      		// timer_show_progress_bar: false,
	      		resume_on_mouseout: true,
				animation: 'fade',
	      		slide_number: false,
	      		animation_speed: 300,
	      		timer_speed: 3000,
	      		timer: true
	    	}
	  	})

	  	jQuery(".orbit-timer").click();

	},

	sliderTest : function(){
		jQuery(".orbit-next").click();
	},

	mobileSlider : function(){
		jQuery(document).foundation({
			orbit: {
	      		timer_show_progress_bar: false,
				animation: 'fade',
	      		slide_number: false,
	      		animation_speed: 200,
	      		timer_speed: 3000
	    	}
	  	})

	  	// fire resize event so mobile registers mobile height
		jQuery(window).resize();
		jQuery(".orbit-timer").click();
	}
}



jQuery(document).ready(function($){

	orb.init();

});
