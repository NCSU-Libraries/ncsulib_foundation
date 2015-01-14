jQuery(function($){
	ga_footer.init();
});

var ga_footer = {
	init : function(){
		// contact
		jQuery('#f-contact-hill').click(function(e){
			_gaq.push(['_trackEvent', 'Footer', 'Contact Us', 'Hill']);
			ga('send', 'event', 'Footer(new)', 'Contact Us(new)', 'Hill(new)');
			ga_footer.pause();
		})
		jQuery('#f-hill-phone').click(function(e){
			_gaq.push(['_trackEvent', 'Footer', 'Contact Us', 'Hill Phone']);
			ga('send', 'event', 'Footer(new)', 'Contact Us(new)', 'Hill Phone(new)');
			ga_footer.pause();
		})
		jQuery('#f-contact-hunt').click(function(e){
			_gaq.push(['_trackEvent', 'Footer', 'Contact Us', 'Hunt']);
			ga('send', 'event', 'Footer(new)', 'Contact Us(new)', 'Hunt(new)');
			ga_footer.pause();
		})
		jQuery('#f-hunt-phone').click(function(e){
			_gaq.push(['_trackEvent', 'Footer', 'Contact Us', 'Hunt Phone']);
			ga('send', 'event', 'Footer(new)', 'Contact Us(new)', 'Hunt Phone(new)');
			ga_footer.pause();
		})

		// libraries
		jQuery('#f-libraries h2 a').click(function(e){
			_gaq.push(['_trackEvent', 'Footer', 'Libraries']);
			ga('send', 'event', 'Footer(new)', 'Libraries(new)');
			ga_footer.pause();
		})

		//Library links
		jQuery('ul#f-lib-links li a').click(function(e){
			var lib = jQuery(this).text();
			_gaq.push(['_trackEvent', 'Footer', 'Libraries', lib]);
			ga('send', 'event', 'Footer(new)', 'Libraries(new)' lib+'(new)');
			ga_footer.pause();
		})

		// util links
		jQuery('ul#f-util-links li a').click(function(e){
			var link = jQuery(this).text();
			_gaq.push(['_trackEvent', 'Footer', 'Utility', link]);
			ga('send', 'event', 'Footer(new)', 'Utility(new)' lib+'(new)');
			ga_footer.pause();
		})

		// social
		jQuery('#f-social ul li a').click(function(e){
			link = jQuery(this).text();
			_gaq.push(['_trackEvent', 'Footer', 'Social', link]);
			ga('send', 'event', 'Footer(new)', 'Social(new)' link+'(new)');
			ga_footer.pause();
		})

		// giving
		jQuery('.giving').click(function(e){
			_gaq.push(['_trackEvent', 'Footer', 'Giving']);
			ga('send', 'event', 'Footer(new)', 'Giving(new)';
			ga_footer.pause();
		})

		// feedback
		jQuery('.feedback-form').click(function(e){
			link = jQuery(this).text();
			_gaq.push(['_trackEvent', 'Footer', 'Feedback']);
			ga('send', 'event', 'Footer(new)', 'Feedback(new)';
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

