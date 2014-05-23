var clear = {
	button : '<a href="#" class="search-cancel-button"><i class="fa fa-times-circle"></i></a>',

	init: function(){
		// add button to page on focus
		jQuery("input[type='search']").on('input', function(e){

			clear.input = jQuery(this);
			clear.input.attr('data-active', 'true');

			if(clear.input.attr('data-has_button') !== 'true'){
				clear.activate_button();
			}
		})


		jQuery("input[type='search']").focus(function(e){
			clear.input = jQuery(this);
			clear.input.attr('data-active', 'true');
		})


		// remove button from page on blur
		jQuery("input[type='search']").blur(function(e){

			if(clear.input){
				clear.input.attr('data-active', 'false');

				if(clear.input.val().length === ''){
					clear.deactivate_button();
				}
			}

		})


		// resize in case some jerk decises to resize the browser while the cancel button is visible
		window.onresize = function(){
			clear.position_button();
		}
	},

	activate_button : function(){
		clear.input.after(clear.button); //add cancel button
		clear.input.attr('data-has_button', 'true');

		// set position of button
		clear.position_button();
		clear.enable_button();
	},

	deactivate_button : function(){
		clear.input.next().remove();
		clear.input.attr('data-has_button', 'false');

		clear.input.css('padding-right', clear.inputPaddingLeft);
		clear.input = undefined;
	},

	position_button : function(){
		// clear.inputPaddingLeft = jQuery(clear.input).css('padding-left');
		// var button = jQuery('.search-cancel-button');
		// var input_font = jQuery(clear.input).css('font-size');
		// var input_font_size = input_font.split('px');
		// var input_font_size = Number(input_font_size[0]);
		// var input_height = jQuery(clear.input).outerHeight();
		// var button_width = input_font_size+15;

		// jQuery(button).css({
		// 	'float' : 'left',
		// 	'margin-left' : 0
		// });

		// jQuery('.search-cancel-button i').css({
		// 	'font-size' : input_font_size+'px',
		// 	'left' : -button_width+'px',
		// 	'height' : input_height,
		// 	'padding-top' : (input_height-input_font_size)*0.5
		// });

		// // add padding to input box so text doesn't disappear begin cancel button
		// clear.input.css({
		// 	'padding-right' : button_width+5+'px',
		// 	'float' : 'left'
		// });
		//
		jQuery("input[type='search']").each(function(){
			clear.inputPaddingLeft = jQuery(this).css('padding-left');
			var button = jQuery('.search-cancel-button');
			var input_font = jQuery(this).css('font-size');
			var input_font_size = input_font.split('px');
			var input_font_size = Number(input_font_size[0]);
			var input_height = jQuery(this).outerHeight();
			var button_width = input_font_size+15;

			jQuery(this).parent().find('.search-cancel-button').css({
				'float' : 'left',
				'margin-left' : 0
			});

			jQuery(this).parent().find('.search-cancel-button i').css({
				'font-size' : input_font_size+'px',
				'left' : -button_width+'px',
				'height' : input_height,
				'padding-top' : (input_height-input_font_size)*0.5
			});

			// add padding to input box so text doesn't disappear begin cancel button
			jQuery(this).css({
				'padding-right' : button_width+5+'px',
				'float' : 'left'
			});

		})

	},

	enable_button : function(){
		jQuery(".search-cancel-button").click(function(e){

			clear.input = jQuery(this).parent().find("input[type='search']");
			clear.input.val('');
			clear.input.focus();
			clear.deactivate_button();

			e.preventDefault();
		})
	},
}

jQuery(function(){
	if(Modernizr.touch){
		clear.init();
	}
})
