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
    hide($content['field_image']);
    hide($content['field_contact_entity_name']);
    hide($content['field_contact_entity_phone']);
    hide($content['field_contact_entity_email']);
    hide($content['field_contact_person']);
    hide($content['field_days_in_advance']);
    hide($content['field_max_reservation_period']);
    hide($content['field_reservable_by']);
    hide($content['field_15_minute_grace_period']);
    hide($content['field_360_image_']);
?>

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

    <div class="row">
        <div class="columns medium-12">
            <?php if($content['field_360_image_']['#items'][0]['value'] == 1): ?>
                <div class="field field-name-field-image field-type-image field-label-hidden">
                    <?='<iframe width="100%" scrolling="no" allowfullscreen src="/sites/all/themes/ncsulib_foundation/templates/includes/vr-loader.html?image=/sites/default/files/'.$content['field_image']['#items'][0]['filename'].'&is_stereo=false&preview=/sites/default/files/'.$content['field_image']['#items'][0]['filename'].'"></iframe>'; ?>
                </div>
            <?php elseif(render($content['field_image'])): ?>
            <?= render($content['field_image']); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row" id="space-meta">
        <div class="columns medium-7">
            <?= render($content['field_building_new_']); ?>
            <?= render($content['field_floor']); ?>
            <?= render($content['field_room_number']); ?>
            <?= render($content['field_capacity']); ?>
        </div>
        <?php if(render($content['field_reservation_method']) != ''): ?>
        <div class="columns medium-5 res-btn">
            <?= render($content['field_reservation_method']); ?>
        </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="columns medium-12">
            <?= render($content); ?>

            <?php if(render($content['field_reservation_method']) != ''): ?>

            <h3>Reservation and Use Guidelines</h3>
            <p>
            <?php if(render($content['field_days_in_advance'])): ?>
            Reservable up to <?= strip_tags(render($content['field_days_in_advance'])); ?> in advance.</br>
            <?php endif; ?>

            <?php if(render($content['field_max_reservation_period'])): ?>
            Reserve for up to <?= strip_tags(render($content['field_max_reservation_period'])); ?>.</br>
            <?php endif; ?>

            <?php

                if(render($content['field_reservable_by'])){
                    $string = strip_tags(implode(', ',explode('</div>',render($content['field_reservable_by']))));
                    echo 'Reservable by '.substr($string, 0, -6).'.</br>';
                }

                if($content['field_15_minute_grace_period'][0]['#markup'] == true){
                    echo 'After 15 minute grace period for arrival, space becomes available to others.</br>';
                }

                echo 'View <a href="http://www.lib.ncsu.edu/spaces/general-room-use-guidelines">room use guidelines</a>.';
            ?>
            </p>
            <?php endif; ?>

            <?php
                if(
                    render($content['field_contact_point']) ||
                    render($content['field_contact_person']) ||
                    render($content['field_contact_entity_name']) ||
                    render($content['field_contact_entity_phone']) ||
                    render($content['field_contact_entity_email'])
                ):
            ?>
            <h3>Contact Info</h3>
            <?php endif; ?>
            <?= render($content['field_contact_point']); ?>
            <?= render($content['field_contact_person']); ?>
            <p><?= render($content['field_contact_entity_name']); ?></p>
            <?= render($content['field_contact_entity_phone']); ?>
            <?= render($content['field_contact_entity_email']); ?>
        </div>

    </div>

  </div>

</article>
