<?php
/**
 * Zoo Health Headlines Block
 * Path: /scrc/zoologicalhealth/news
 * Author: Charlie Morris
 * Date: ~10/2011
 *
 * Brings in a news feed
 * TODO: port to Feeds Aggregator
 *
 */
?>
<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="block block-<?php print $block->module ?>">
<?php if ($block->subject): ?>
  <h2><?php print $block->subject ?></h2>
<?php endif;?>
  <div class="content">
	<?php require_once("/var/www/site/htdocs/news/includes/headlines-zoologicalhealth-drupal.php"); ?>
  </div>
</div>
