jQuery(function(){
	jQuery('.policies').click(function(e){
		$(this).parent().next().toggle();
		e.preventDefault();
	})
})
