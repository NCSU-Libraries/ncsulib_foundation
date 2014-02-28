// instantiate foundation
(function ($, Drupal, window, document, undefined) {
	$(document).foundation();

	// remove viewport for non-responsive sites
	console.log($('body').hasClass('non-responsive'));
})(jQuery, Drupal, this, this.document);
