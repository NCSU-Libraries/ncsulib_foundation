jQuery(function($){
	ga_footer.init();
});

var ga_footer = {
	init : function(){
		// contact
		jQuery('#f-contact-hill').click(function(e){
			// _gaq.push(['_trackEvent', 'Footer', 'Contact Us', 'Hill']);
			ga('send', 'event', 'Footer', 'Contact Us', 'Hill');
			ga_footer.pause();
		})
		jQuery('#f-hill-phone').click(function(e){
			// _gaq.push(['_trackEvent', 'Footer', 'Contact Us', 'Hill Phone']);
			ga('send', 'event', 'Footer', 'Contact Us', 'Hill Phone');
			ga_footer.pause();
		})
		jQuery('#f-contact-hunt').click(function(e){
			// _gaq.push(['_trackEvent', 'Footer', 'Contact Us', 'Hunt']);
			ga('send', 'event', 'Footer', 'Contact Us', 'Hunt');
			ga_footer.pause();
		})
		jQuery('#f-hunt-phone').click(function(e){
			// _gaq.push(['_trackEvent', 'Footer', 'Contact Us', 'Hunt Phone']);
			ga('send', 'event', 'Footer', 'Contact Us', 'Hunt Phone');
			ga_footer.pause();
		})

		// libraries
		jQuery('#f-libraries h2 a').click(function(e){
			// _gaq.push(['_trackEvent', 'Footer', 'Libraries']);
			ga('send', 'event', 'Footer', 'Libraries');
			ga_footer.pause();
		})

		//Library links
		jQuery('ul#f-lib-links li a').click(function(e){
			var lib = jQuery(this).text();
			// _gaq.push(['_trackEvent', 'Footer', 'Libraries', lib]);
			ga('send', 'event', 'Footer', 'Libraries', lib);
			ga_footer.pause();
		})

		// util links
		jQuery('ul#f-util-links li a').click(function(e){
			var link = jQuery(this).text();
			// _gaq.push(['_trackEvent', 'Footer', 'Utility', link]);
			ga('send', 'event', 'Footer', 'Utility', lib);
			ga_footer.pause();
		})

		// social
		jQuery('#f-social ul li a').click(function(e){
			link = jQuery(this).text();
			// _gaq.push(['_trackEvent', 'Footer', 'Social', link]);
			ga('send', 'event', 'Footer', 'Social', link);
			ga_footer.pause();
		})

		// giving
		jQuery('.giving').click(function(e){
			// _gaq.push(['_trackEvent', 'Footer', 'Giving']);
			ga('send', 'event', 'Footer', 'Giving');
			ga_footer.pause();
		})

		// feedback
		jQuery('.close-feedback').click(function(e){
			ga('send', 'event', 'Footer', 'Feedback', 'close feedback');
			ga_footer.pause();
		})
		jQuery('.feedback-form').click(function(e){
			link = jQuery(this).text();
			// _gaq.push(['_trackEvent', 'Footer', 'Feedback']);
			ga('send', 'event', 'Footer', 'Feedback');
			ga_footer.pause();
		})
	},

	pause : function(){
		var date = new Date();
        var curDate = null;
        do {
            curDate = new Date();
        } while(curDate-date < 200);
	},

	capitalize : function(str){
    	return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
	}
};

