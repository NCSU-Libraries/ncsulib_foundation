<?php print $output; ?>
<div class="additional-details">
  <?php // reaching out, grabbing and printing other fields ?>
  <?php if (!empty($row->field_field_capacity)): ?>
    <?php print "<p>Capacity: ". render($row->field_field_capacity[0]['rendered']) . "</p>"; ?>
  <?php endif; ?>

  <?php if (isset($row->field_field_policies)): ?>
    <p class="policies">Reservation and Use Guidelines</p>
    <ul class="policies-list">
    <?php for ($i=0; $i < sizeof($row->field_field_policies); $i++) :?>
      <?php print "<li>". render($row->field_field_policies[$i]['rendered']) . "</li>"; ?>
    <?php endfor; ?>
    </ul>
  <? endif; ?>
</div> <!-- end .additional-details -->
