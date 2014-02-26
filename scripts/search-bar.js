var searchbar = {
	init : function() {
		// on
		jQuery('#search-submit').click(function(e){
			jQuery(this).addClass('active');
			jQuery('#search-all').addClass('active');
		});

    // show or hide for small breakpoint
    jQuery('#search-toggle').click( function() {
      jQuery('#utility-search').toggle('slow');
    });

    // show the searchbar if the window is resized over the medium breakpoint
    jQuery(window).resize( function() {
      searchbar.checkwidth();
    });
	},
  checkwidth : function() {
    var windowsize = jQuery(window).width();
    if (windowsize > searchbar.mediumBreakpoint) {
      jQuery('#utility-search').show();
    }
  },
  mediumBreakpoint: 767
};

jQuery(function(){
	searchbar.init();
});
