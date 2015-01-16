jQuery(function($){
	ga_nav.init();
});

var ga_nav = {
	init : function(){
		// top level nav
		jQuery('.primary-nav li a').hover(function(e){
			ga_nav.primary_page = jQuery(this).text();
		})

		jQuery('.primary-nav li a').click(function(e){
			var page = jQuery(this).text();
			// _gaq.push(['_trackEvent', 'Global Nav', page, page]);
			ga('send', 'event', 'Global Nav', page, page);
			ga_nav.pause();
		})

		// secondary level nav
		jQuery('.primary-nav-menus ul li a').click(function(e){
			var page = jQuery(this).text();
			// _gaq.push(['_trackEvent', 'Global Nav', ga_nav.primary_page, page]);
			ga('send', 'event', 'Global Nav', ga_nav.primary_page, page);
			ga_nav.pause();
		})

		// utility nav items
		// hours
		jQuery('#hours-title a').click(function(e){
			// _gaq.push(['_trackEvent', 'Global Nav', "Today's Hours"]);
			ga('send', 'event', 'Global Nav', "Today's Hours");
			ga_nav.pause();
		})

		jQuery('#home-hours ul li a').click(function(e){
			var link = jQuery(this).children('span.library').text();
			// _gaq.push(['_trackEvent', 'Global Nav', "Today's Hours", link]);
			ga('send', 'event', 'Global Nav', "Today's Hours", link);
			ga_nav.pause();
		})

		jQuery('#utility-links li a').click(function(e){
			var link = jQuery(this).text();
			// _gaq.push(['_trackEvent', 'Global Nav', "Utility Links", link]);
			ga('send', 'event', 'Global Nav', "Utility Links", link);
			ga_nav.pause();
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

