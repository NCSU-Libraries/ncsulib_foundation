var _360 = {
    num : 0,
    init : function(){
        if (window.confirm('Hey Dre, did this work?')) {
            // window.location.href='http://www.theuselessweb.com/';
        };
    },

    getURLsegment : function(num){
        var pathArray = window.location.pathname.split( '/' );

        return pathArray[num];
    },
	
	removeUnwantedPageElements : function() {
		// Get rid of mobile sidebar and hamburger menu.
		$('#mobile-action-page').remove();
		$('#hamburger').remove();

		// Reformat main pane to take full site width.
		$('#mobile-main-page').removeClass('span8').addClass('span12');
	}
}

jQuery(function($) {
    _360.init();
	
	_360.removeUnwantedPageElements();
});
