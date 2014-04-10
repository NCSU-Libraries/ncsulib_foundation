var code = {
	init : function(){
		code.escapeTags();
		// code.handleToggle();
	},

	escapeTags : function(){
		// escape tags in <code>
		jQuery('code').each(function(){
			var str = jQuery(this).html();
			var stripped = str.replace(/</g,'&lt;').replace(/>/g,'&gt;'); //replace all < and > brackets so html will not render.
			var stripped = stripped.replace(/&lt;pre&gt;/g,'<pre>').replace(/&lt;\/pre&gt;/g,'</pre>'); //replace <pre>
			jQuery(this).html(stripped);
		})
	},

	// handleToggle : function(){
	// 	var oldHTML = jQuery('code[data-toggle]').html();
	// 	// toggle <code> blocks
	// 	jQuery('code[data-toggle]').prev().after('<a href="#" class="toggle-code">Get code</a>');
	// 	jQuery('code[data-toggle]').hide();
	// 	jQuery('.toggle-code').on('click', function(e){
	// 		jQuery(this).next().slideToggle('fast', function(){
	// 			if(jQuery(this).is(':visible')){
	// 				jQuery(this).prev().text('Hide code');
	// 			} else{
	// 				jQuery(this).prev().text('Get code');
	// 			}
	// 		});

	// 		e.preventDefault();
	// 	});
	// }
}

jQuery(function(){
	console.log('hit');
	code.init();
})

