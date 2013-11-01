/*
 * jQuery In-field Labels Plugin v1.0
 * http://richardscarrott.co.uk/posts/view/jquery-in-field-labels
 *
 * Copyright (c) 2010 Richard Scarrott
 *
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * Requires jQuery v1.3+
 *
 */

(function($) {
	$.fn.inFieldLabels = function(filter) {

		var removeLabel = function($input) {
			// remove label if in 'label' state
			if ($input.hasClass('dummy')) {
				$input.hide().prev('input').show().focus();
			}
			else if ($input.hasClass('label')) {
				$input.removeClass('label').val('');
			}
		};
		
		var addLabel = function($input) {
			var label = $input.data('label'),
				val = $input.val();
			
			// add label if val is empty
			if ($input.is('input:password') && (val === '')) {
				$input.hide().next('input').val(label).show();
			}
			else if (val === '') {
				$input.addClass('label').val(label);
			}
		};

		return this.each(function() {
			var $form = $(this),
				$inputs = $form.find('input[type=text], input[type=password], textarea');

			if (filter) {$inputs = $inputs.filter(filter);}
			
			$inputs.each(function() {
				var $input = $(this),
					label = $form.find('label[for=' + $input.attr('id') + ']').hide().text();

				$input.data('label', label)
						.focus(function() {
							removeLabel($input);
						}).blur(function() {
							addLabel($input);
						});
				
				if ($input.is('input:password')) {
					var $dummy = $('<input type="text" class="dummy label" />').insertAfter($input).focus(function() {
						removeLabel($dummy);
					});
					if ($input.val() !== '') {$dummy.hide();}
				}
				addLabel($input);
			});
			
			$form.submit(function() {
				$inputs.each(function() {
					removeLabel($(this));
				});
			});
		});
	};
})(jQuery);