<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if ($title): ?>
      <?php print render($title_prefix); ?>
          <h1 id="page-title" class="title"><?php print $title; ?></h1>
      <?php print render($title_suffix); ?>
  <?php endif; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div class="content "<?php print $content_attributes; ?>>
    <?php
        // We hide the comments and links because we will not use them.
        hide($content['comments']);
        hide($content['links']);
        hide($content['field_featured_image']);
        hide($content['field_reservation_method']);
        hide($content['field_building_name']);
        hide($content['field_building_new_']);
        hide($content['field_room_number']);
        hide($content['field_capacity']);
        hide($content['field_floor']);
        hide($content['field_contact_entity_name']);
        hide($content['field_contact_entity_phone']);
        hide($content['field_contact_entity_email']);
        hide($content['field_contact_person']);
        hide($content['field_days_in_advance']);
        hide($content['field_max_reservation_period']);
        hide($content['field_reservable_by']);
        hide($content['field_15_minute_grace_period']);
    ?>


    <!-- <div class="columns medium-12"> -->


    <div class="row">
        <div class="columns medium-8">
            <?= render($content['field_image']); ?>
        </div>
        <div class="columns medium-4">
            <?= render($content['field_building_new_']); ?>
            <?= render($content['field_capacity']); ?>
            <?= render($content['field_floor']); ?>
            <?= render($content['field_room_number']); ?>
            <?= render($content['field_reservation_method']); ?>
        </div>

        <div class="columns medium-12">
            <?= render($content); ?>

            <h3>Usage Policies</h3>
            <?php if($content['field_days_in_advance']): ?>
            <p>Reservable up to <?= strip_tags(render($content['field_days_in_advance'])); ?> in advance.</br>
            <?php endif; ?>

            <?php if($content['field_max_reservation_period']): ?>
            Reserve for up to <?= strip_tags(render($content['field_max_reservation_period'])); ?>.</br>
            <?php endif; ?>

            <?php

                if($content['field_reservable_by']){
                    $string = strip_tags(implode(', ',explode('</div>',render($content['field_reservable_by']))));
                    echo 'Reservable by '.substr($string, 0, -6).'.</br>';
                }

                if($content['field_15_minute_grace_period']){
                    echo 'After 15 minute grace period for arrival, space becomes available to others.';
                }
            ?>
            </p>


            <h3>Contact Info</h3>
            <?= render($content['field_contact_point']); ?>
            <?= render($content['field_contact_person']); ?>
            <p><?= render($content['field_contact_entity_name']); ?></p>
            <?= render($content['field_contact_entity_phone']); ?>
            <?= render($content['field_contact_entity_email']); ?>
        </div>

    </div>

  </div>

</article>