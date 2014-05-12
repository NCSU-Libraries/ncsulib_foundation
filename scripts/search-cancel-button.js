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
		jQuery(clear.input).css('padding-right', clear.inputPaddingLeft+'px');
		// console.log(clear.inputPaddingLeft);
	},

	position_button : function(){
		clear.input = jQuery('.search-cancel-button').prev();
		var button = jQuery('.search-cancel-button');
		var input_font = jQuery(clear.input).css('font-size');
		var input_font_size = input_font.split('px');
		var input_font_size = input_font_size[0];
		var input_height = jQuery(clear.input).outerHeight();
		var input_width = jQuery(clear.input).outerWidth();
		var parentWidth = jQuery(clear.input).offsetParent().outerWidth();
		var percent = (100*(input_width/parentWidth));
		var inputPaddingLeft = jQuery(clear.input).css('padding-left');
		clear.inputPaddingLeft = inputPaddingLeft.split('px');
		clear.inputPaddingLeft = clear.inputPaddingLeft[0];
		console.log(clear.inputPaddingLeft);
		// goddamn that is a lot of vars

		// console.log(jQuery(input).css('width'));

		jQuery(button).css({
			'font-size' : input_font_size,
			'width' : input_font_size+10,
			'right' : -(percent)+'%',
		});

		jQuery('.search-cancel-button i').css({
			'left' : '-13px',
			'height' : input_height,
			'padding-top' : (input_height-input_font_size)*0.5
		});

		// add padding to input box so text doesn't disappear begin cancel button
		var p = jQuery('.search-cancel-button').position();
		jQuery(clear.input).css('padding-right', input_width-p.left+'%');

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
	// clear.init();
})
