var searchbar = {
	init : function() {
		// on
		$('#search-submit').click(function(e){
			$(this).addClass('active');
			$('#search-all').addClass('active');

			// e.preventDefault();
		})
	}
}

$(function(){
	searchbar.init();
})
