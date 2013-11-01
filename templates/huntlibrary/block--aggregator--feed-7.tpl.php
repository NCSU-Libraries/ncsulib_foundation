<?php
/**
 * NCSU Libraries News Blog tag Hunt Library (feed aggregator blog)
 * Path: /huntlibrary
 * Author: Charlie Morris
 * Date: 12/14/12
 *
 * Using this for nothing more than to add a grid-6 wrapper prefix around the block
 * TODO: move this into a preprocessor
 *
 */
?>
<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="grid-6 omega block block-<?php print $block->module ?>">

<?php if ($block->subject): ?>
  <h2><?php print $block->subject; ?></h2>
<?php endif;?>

<?php if ($variables['elements']['#markup']): ?>
  <div><?php  print $variables['elements']['#markup']; ?></div>
<?php endif;?>

</div>
