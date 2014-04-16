jQuery(function($){
	// top level nav
	$('#primary-nav li a').click(function(e){
		var page = $(this).data('menu');
		console.log(page.toUpperCase());
		e.preventDefault();
	})
	// _gaq.push(['_trackEvent', 'Global Nav', 'Find', 'Find']);
	// _gaq.push(['_trackEvent', 'Global Nav', 'Get Help', 'Get Help']);
	// _gaq.push(['_trackEvent', 'Global Nav', 'Services', 'Services']);

});


function pause() {
    var date = new Date();
        var curDate = null;
        do {
            curDate = new Date();
        } while(curDate-date < 200);
}
