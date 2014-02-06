var searchbar = {
	init : function() {
		// on
		jQuery('#search-submit').click(function(e){
			jQuery(this).addClass('active');
			jQuery('#search-all').addClass('active');

			// e.preventDefault();
		})
	}
}

jQuery(function(){
	searchbar.init();
})
