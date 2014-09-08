<?php if ($block->delta != 'main'):  ?>
  <section class="<?php print $classes; ?>"<?php print $attributes; ?>>
<?php endif; ?>

  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
    <h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <?php !empty($content_attributes) ? print '<div ' .  $content_attributes . '>' : ''; ?>
    <?php print $content ?>
  <?php !empty($content_attributes) ? print '</div>' : ''; ?>

<?php $block->delta != 'main' ? print '</section>' : ''; ?>
