jQuery(function($){
	ga_footer.init();
});

var ga_footer = {
	init : function(){
		// contact
		$('#f-contact-hill').click(function(e){
			_gaq.push(['_trackEvent', 'Footer', 'Contact Us', 'Hill']);
			ga_footer.pause();
		})
		$('#f-hill-phone').click(function(e){
			_gaq.push(['_trackEvent', 'Footer', 'Contact Us', 'Hill Phone']);
			ga_footer.pause();
		})
		$('#f-contact-hunt').click(function(e){
			_gaq.push(['_trackEvent', 'Footer', 'Contact Us', 'Hunt']);
			ga_footer.pause();
		})
		$('#f-hunt-phone').click(function(e){
			_gaq.push(['_trackEvent', 'Footer', 'Contact Us', 'Hunt Phone']);
			ga_footer.pause();
		})

		// libraries
		$('#f-libraries h2 a').click(function(e){
			_gaq.push(['_trackEvent', 'Footer', 'Libraries']);
			ga_footer.pause();
		})

		//Library links
		$('ul#f-lib-links li a').click(function(e){
			var lib = $(this).text();
			_gaq.push(['_trackEvent', 'Footer', 'Libraries', lib]);
			ga_footer.pause();
		})

		// util links
		$('ul#f-util-links li a').click(function(e){
			var link = $(this).text();
			_gaq.push(['_trackEvent', 'Footer', 'Utility', link]);
			ga_footer.pause();
		})

		// social
		$('#f-social ul li a').click(function(e){
			link = $(this).text();
			_gaq.push(['_trackEvent', 'Footer', 'Social', link]);
			ga_footer.pause();
		})

		// giving
		$('.giving').click(function(e){
			_gaq.push(['_trackEvent', 'Footer', 'Giving']);
			ga_footer.pause();
		})

		// feedback
		$('.feedback-form').click(function(e){
			link = $(this).text();
			_gaq.push(['_trackEvent', 'Footer', 'Feedback']);
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

