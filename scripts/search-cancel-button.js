var clear = {
	button : '<a href="#" class="search-cancel-button"><i class="fa fa-times-circle"></i></a>',

	init: function(){
		// add button to page on focus
		jQuery("input[type='search']").on('input', function(e){
			var val = jQuery(this).val();
			if(val.length <= 1){
				clear.activate_button();
			}
		})

		// remove button from page on blur
		jQuery("input[type='search']").blur(function(e){
			var val = jQuery(this).val();
			if(val.length == ''){
				clear.deactivate_button();
			}
		})


	},

	activate_button : function(){
			jQuery("input[type='search']").after(clear.button);

			// set position of button
			clear.position_button();
			clear.enable_button();
	},

	deactivate_button : function(){
		jQuery('.search-cancel-button').remove();
	},

	position_button : function(){
		// get font size
		var elem = jQuery('.search-cancel-button').prev();
		var input_font = jQuery(elem).css('font-size');
		var input_font_size = input_font.split('px');
		var input_font_size = input_font_size[0];
		var input_height = jQuery(elem).outerHeight();
		var input_width = jQuery(elem).outerWidth();
		jQuery('.search-cancel-button').css({
			'font-size' : input_font_size,
			'width' : input_font_size+10,
			'right' : -(input_width-input_font_size-5),
			'top' : (input_height-input_font_size)*0.5
		});
	},

	enable_button : function(){
		jQuery(".search-cancel-button").click(function(e){

			jQuery("input[type='search']").val('');
			jQuery("input[type='search']").focus();
			clear.deactivate_button();

			e.preventDefault();
		})
	}
}

jQuery(function(){
	clear.init();
})
