(function ($, Drupal) {

  Drupal.behaviors.ncsulib_foundation = {
    attach: function(context, settings) {
      // Get your Yeti started.
    }
  };

 	$(document).foundation('orbit', {
  		animation: 'fade',
  		slide_number: false,
	});

})(jQuery, Drupal);
