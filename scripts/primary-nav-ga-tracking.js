jQuery(function($){
	ga_nav.init();
});

var ga_nav = {
	init : function(){
		// top level nav
		$('.primary-nav li a').hover(function(e){
			ga_nav.primary_page = $(this).text();
		})

		$('.primary-nav li a').click(function(e){
			var page = $(this).text();
			_gaq.push(['_trackEvent', 'Global Nav', page, page]);
			ga_nav.pause();
		})

		// secondary level nav
		$('.primary-nav-menus ul li a').click(function(e){
			var page = $(this).text();
			_gaq.push(['_trackEvent', 'Global Nav', ga_nav.primary_page, page]);
			ga_nav.pause();
		})

		// utility nav items
		// hours
		$('#hours-title a').click(function(e){
			_gaq.push(['_trackEvent', 'Global Nav', "Today's Hours"]);
			ga_nav.pause();
		})

		$('#home-hours ul li a').click(function(e){
			var link = $(this).children('span.library').text();
			_gaq.push(['_trackEvent', 'Global Nav', "Today's Hours", link]);
			ga_nav.pause();
		})

		$('#utility-links li a').click(function(e){
			var link = $(this).text();
			_gaq.push(['_trackEvent', 'Global Nav', "Utility Links", link]);
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

