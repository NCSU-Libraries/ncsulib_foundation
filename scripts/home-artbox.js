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
				animation: 'fade',
	      		slide_number: false,
	      		resume_on_mouseout: true
	    	}
	  	})
	},

	mobileSlider : function(){
		jQuery(document).foundation({
			orbit: {
				animation: 'fade',
	      		slide_number: false
	    	}
	  	})

	  	// fire resize event so mobile registers mobile height
		jQuery(window).resize();
	}
}



jQuery(document).ready(function($){

	orb.init();

});
