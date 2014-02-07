<?php
  	// if(!$_SERVER['REMOTE_ADDR']){
		$_SERVER['REMOTE_ADDR'] = '';
  		define('DRUPAL_ROOT', '/var/www/webdev/drupal');
  		require_once (DRUPAL_ROOT.'/includes/bootstrap.inc');
  		drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
  	// }
?>

<?php print $head; ?>
<link rel="shortcut icon" href="http://lib.ncsu.edu/sites/all/themes/ncsulibraries/favicon.ico" rel="shortcut icon">
<?php print $styles; ?>
<?php print $scripts; ?>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
