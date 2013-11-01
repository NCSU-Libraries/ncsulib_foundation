<?php
/**
 * Photos and Video Gallery
 * Path: /huntlibrary/photosandvideogallery
 * Author: Charlie Morris
 * Date: December 2012
 *
 * A port of the HTML version of the gallery page.  Just adding CSS and JS.
 * TODO: Continue Drupalization, see page--huntlibrary--mediagallery.tpl.php
 *
 */

drupal_add_css('sites/all/themes/ncsulibraries/scripts/fancybox/jquery.fancybox-1.3.4.css', 'file');
drupal_add_js('sites/all/themes/ncsulibraries/scripts/fancybox/jquery.fancybox-1.3.4.pack.js', 'file');
drupal_add_js('sites/all/themes/ncsulibraries/scripts/fancybox/jquery.easing-1.3.pack.js', 'file');
drupal_add_js('jQuery(document).ready(function($){$("a.galleryimage").fancybox({"titlePosition":"inside"})});', array('type' => 'inline', 'scope' => 'footer'));
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>

