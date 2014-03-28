<?php
  // TODO fix all this. send logic to template.php... so much needs fixing
  drupal_add_css(drupal_get_path('theme', 'ncsulibraries').'/styles/space.css');
  $today = date('m-d-Y');  // needed for reservation system links
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>
    <?php if(!empty($content['field_image'])): ?>
      <img class="space-photo" src="/sites/default/files/<?php print substr($content['field_image']['#items']['0']['uri'], 9); ?>" alt="<?php print $content['field_image']['#items']['0']['alt']; ?>" title="<?php print $content['field_image']['#items']['0']['title']; ?>" >
    <?php endif; ?>
  <?php if (!$page): ?>
    <?php print render($title_prefix); ?>
    <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
    <?php print render($title_suffix); ?>
  <?php endif; ?>
  <?php if ($field_building_name && $field_room_number): ?>
    <div class="space-attributes">

      <em><?php print render($content['field_building_name']);?>, Room(s)
        <?php
        $size = sizeof($content['field_room_number']['#items']);
        for ($i=0; $i < $size; $i++) {
          if ($i == ($size-1)) {
            print $content['field_room_number']['#items'][$i]['value'];
          } else {
            print $content['field_room_number']['#items'][$i]['value']. ", ";
          }
        }
      endif; ?>
      </em>
    </div>

  <?php
  // Logic for printing reservation info
  if (isset($content['field_reservation_method'])){
    switch ($content['field_reservation_method']['#items']['0']['value']) {
        case 'By Mediated Email Form':
          // Get the node items that we're interested in
          $reservation_url = isset($content['field_request_form_url'][0]['#element']['url']) ? $content['field_request_form_url'][0]['#element']['url'] :  '/huntlibrary/roomrequest';
          print '<a class="reserve-button" href="' . $reservation_url . '">Request this room</a>';
          break;

        case 'By Room Reservation System':
          print '<a class="reserve-button" href="http://www.lib.ncsu.edu/roomreservations/schedule.php?date='.$today.'&scheduleid='.$content['field_room_res_id'][0]['#markup'].'">Reserve this room</a>';
          break;

        default:
          break;
    }
  }
  ?>
  <div class="description">
    <?php
      // Displayed above or not something we want to display to user, so, hiding.
      hide($content['field_image']);
      hide($content['field_room_res_id']);
      hide($content['field_request_form_url']);
      hide($content['field_room_number']);
      hide($content['field_building_name']);
      hide($content['field_reservation_method']);
      hide($content['field_contact_point']);
    ?>
    <?php print render($content); ?>
  </div>
  </div>
</div>
