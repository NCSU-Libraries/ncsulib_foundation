  	<?php print $head; ?>
  	<link rel="shortcut icon" href="http://lib.ncsu.edu/sites/all/themes/ncsulibraries/favicon.ico" rel="shortcut icon">
  	<?php print $styles; ?>
  	<!-- jquery first -->
  	<?php drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/vendor/jquery-1.10.2.min.js'); ?>
  	<?php print $scripts; ?>
  	<!-- instantiate foundation -->
	<script>
    	(function ($, Drupal, window, document, undefined) {
    		$(document).foundation();
    	})(jQuery, Drupal, this, this.document);
  	</script>
  	<!--[if lt IE 9]>
    	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  	<![endif]-->
