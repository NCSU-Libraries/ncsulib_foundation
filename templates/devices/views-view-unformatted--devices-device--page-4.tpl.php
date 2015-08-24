<?php
// /techlending
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <?php if ($id%4 == 0): ?>
    <div class="row" data-equalizer>
  <?php endif; ?>

  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?> data-equalizer-watch>
    <?php print $row; ?>
  </div>

  <?php if ($id%4 == 3): ?>
    </div> <!-- end .row -->
  <?php endif; ?>

<?php endforeach; ?>