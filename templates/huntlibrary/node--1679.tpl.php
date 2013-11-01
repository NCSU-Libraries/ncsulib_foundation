<?php
/**
 * Naming Opportunities at Hunt Library
 * Path: /huntlibrary/namingopportunities
 * Author: Charlie Morris
 * Date: December 2012
 *
 * This is a simple port of an HTML version.  It needs to be better Drupalized
 * but this will do for now.  TODO: drupalization.
 */
drupal_add_css('sites/all/themes/ncsulibraries/styles/basix/jquery-ui-1.8.20.custom.css', 'file');
drupal_add_css('sites/all/themes/ncsulibraries/scripts/fancybox/jquery.fancybox-1.3.4.css', 'file');
drupal_add_css('sites/all/themes/ncsulibraries/styles/tablesorter.css', 'file');
drupal_add_css('sites/all/themes/ncsulibraries/styles/namingopps.css', 'file');
drupal_add_js('sites/all/themes/ncsulibraries/scripts/minified/jquery-ui-1.8.20.custom.min.js', 'file');
drupal_add_js('sites/all/themes/ncsulibraries/scripts/minified/jquery.imagemapster.min.js', 'file');
drupal_add_js('sites/all/themes/ncsulibraries/scripts/fancybox/jquery.fancybox-1.3.4.pack.js', 'file');
drupal_add_js('sites/all/themes/ncsulibraries/scripts/fancybox/jquery.easing-1.3.pack.js', 'file');
drupal_add_js('sites/all/themes/ncsulibraries/scripts/namingopps.js', 'file');
drupal_add_js('sites/all/themes/ncsulibraries/scripts/minified/jquery.tablesorter.min.js', 'file');

?>
<?php print render($content); ?>
