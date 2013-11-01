<?php
/**
 * Sustainability Slideshow page
 * Path: /huntlibrary/sustainability
 * Author: Charlie Morris
 * Date: February 2013
 *
 * Just adding JS for fancybox
 */
drupal_add_css('sites/all/themes/ncsulibraries/scripts/fancybox/jquery.fancybox-1.3.4.css', 'file');
drupal_add_js('sites/all/themes/ncsulibraries/scripts/fancybox/jquery.fancybox-1.3.4.pack.js', 'file');
drupal_add_js('sites/all/themes/ncsulibraries/scripts/fancybox/jquery.easing-1.3.pack.js', 'file');
?>
<?php print render($content); ?>
