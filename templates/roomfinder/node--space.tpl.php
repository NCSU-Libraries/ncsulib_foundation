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

  <div class="content row"<?php print $content_attributes; ?>>
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
    ?>

    <div class="columns medium-8">
        <div class="row">
            <div class="columns medium-12">
                <?= render($content['field_image']); ?>
            </div>
        </div>
        <?= render($content); ?>
    </div>
    <div class="columns medium-4">
        <?= render($content['field_building_new_']); ?>
        <?= render($content['field_capacity']); ?>
        <?= render($content['field_room_number']); ?>
        <?= render($content['field_reservation_method']); ?>
    </div>

  </div>

</article>