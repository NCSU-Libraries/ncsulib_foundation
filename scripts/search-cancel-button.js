var clear = {
	button : '<a href="#" class="search-cancel-button"><i class="fa fa-times-circle"></i></a>',
	buttonIsAdded : false,

	init: function(){
		// add button to page on focus
		jQuery("input[type='search']").on('input', function(e){
			var val = jQuery(this).val();
			if(val.length != 0 && !clear.buttonIsAdded){ //if input has any text
				clear.activate_button();
			 } else if(val.length == 0 && clear.buttonIsAdded){ //remove button if text has been deleted
				clear.deactivate_button();
			}

		})

		// remove button from page on blur
		jQuery("input[type='search']").blur(function(e){
			var val = jQuery(this).val();
			if(val.length == ''){
				clear.deactivate_button();
			}
		})

		jQuery("input[type='search']").focus(function(e){
			var val = jQuery(this).val();

			if(val.length != 0 && !clear.buttonIsAdded){ //if input has any text
				clear.activate_button();
			}
		})

		// resize in case some jerk decises to resize the browser while the cancel button is visible
		window.onresize = function(){
			if(clear.buttonIsAdded){
				clear.position_button();
			}
		}
	},

	activate_button : function(){
			jQuery("input[type='search']").after(clear.button);
			clear.buttonIsAdded = true;

			// set position of button
			clear.position_button();
			clear.enable_button();
	},

	deactivate_button : function(){
		jQuery('.search-cancel-button').remove();
		jQuery(clear.input).css('padding-right', clear.inputPaddingLeft+'px');

		clear.buttonIsAdded = false;
	},

	position_button : function(){
		clear.input = jQuery('.search-cancel-button').prev();
		var button = jQuery('.search-cancel-button');
		var input_font = jQuery(clear.input).css('font-size');
		var input_font_size = input_font.split('px');
		var input_font_size = Number(input_font_size[0]);
		var input_height = jQuery(clear.input).outerHeight();
		var button_width = input_font_size+15;

		jQuery(button).css({
			'float' : 'left',
			'margin-left' : 0
		});

		jQuery('.search-cancel-button i').css({
			'font-size' : input_font_size+'px',
			'left' : -button_width+'px',
			'height' : input_height,
			'padding-top' : (input_height-input_font_size)*0.5
		});

		// add padding to input box so text doesn't disappear begin cancel button
		jQuery(clear.input).css({
			'padding-right' : button_width+5+'px',
			'float' : 'left'
		});

	},

	enable_button : function(){
		jQuery(".search-cancel-button").click(function(e){

			jQuery("input[type='search']").val('');
			jQuery("input[type='search']").focus();
			clear.deactivate_button();

			e.preventDefault();
		})
	},
}

jQuery(function(){
	clear.init();
})
