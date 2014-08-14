<?php
  /**
   * Event node
   * Author: Charlie Morris
   * Date: 3/28/13
   */
  drupal_add_css(drupal_get_path('theme', 'ncsulib_foundation').'/styles/event.css');
?>

<?php
    $time = field_get_items('node', node_load($node->nid), 'field_time');
    $value1 = strtotime($time[0]['value'])+ncsulib_foundation_adjust_for_timezone($time[0]['value']);
    $value2 = strtotime($time[0]['value2'])+ncsulib_foundation_adjust_for_timezone($time[0]['value2']);

    $start_date = date('F j, Y', $value1);
    $end_date = date('F j, Y', $value2);
    $date_display = ($start_date != $end_date) ? $start_date . ' to ' . $end_date : $start_date;

    $start_time = date('g:ia', $value1);
    $end_time = date('g:ia', $value2);
    $time_display = ($start_time != $end_time) ? $start_time . ' - ' . $end_time : $start_time;

    $space_nid = $node->field_space['und'][0]['target_id'];
    $space_node = node_load($space_nid);
?>
<h1><?php echo $title; ?></h1>
<div id="event-node" class="row">
    <div class="columns medium-7">
        <div class="event-meta">
            <h5><strong>When:</strong> <?= $date_display.', '.$time_display; ?></h5>
            <!--h5 class="subheader"><strong>Where:</strong> <?php echo 'at the <a href="/node/' . $space_nid  . '">' . $space_node->title . '</a>'; ?></h5-->
            <?php
                // Loading date from the associated space node, including title,
                // building_name and, if CVRL, the body
                if (!empty($node->field_space)) {
                    // The nid of the related space
                    $space_nid = $node->field_space['und'][0]['target_id'];

                    // Load the node into the page
                    $space_node = node_load($space_nid);

                    // Get the node items that we're interested in
                    $building_field = field_get_items('node', $space_node, 'field_building_name');
                    $space_body = field_get_items('node', $space_node, 'body');

                    // Display related node's fields
                    print '<h5 class="subheader"><strong>Where:</strong> The <a href="/node/' . $space_nid  . '">' . $space_node->title . '</a>';
                    switch ($space_node->title) {
                        // A bit of a stopgap for CVRL and Brickyard until a better
                        // alternative can be constructed/architected
                        case 'Cameron Village Regional Library':
                            $cvrl_body = field_view_value('node', $space_node, 'body', $space_body[0]);
                            print render($cvrl_body);
                            break;

                        case 'Brickyard':
                        case 'Oval':
                            break;

                        default:
                            $building_out = field_view_value('node', $space_node, 'field_building_name', $building_field[0]);
                            print ' in ' . render($building_out);
                            break;
                  }
                  print '</h5>';
                }

            ?>
        </div>

        <?php echo $node->body['und'][0]['value']; ?>

        <!-- contact -->
        <?php if( isset($content['field_contact_name']) || isset($content['field_contact_phone']) || isset($content['field_contact_email'])): ?>
            <h3>Contact Info</h3>
        <?php endif; ?>
        <?php print drupal_render($content['field_contact_name']); ?>
        <?php print drupal_render($content['field_contact_phone']); ?>
        <?php print drupal_render($content['field_contact_email']); ?>

        <!-- admission -->
        <?php if($node->field_admission_information): ?>
        <h3>Admission Info</h3>
        <p><?php echo $node->field_admission_information['und'][0]['value']; ?></p>
        <?php endif; ?>

        <!-- other -->
        <?php if($node->field_other_information): ?>
        <h3>More Info</h3>
        <p><?php echo $node->field_other_information['und'][0]['value']; ?></p>
        <?php endif; ?>

    </div>
    <div class="columns medium-5">
        <?php print drupal_render($content['field_image_for_event']); ?>
    </div>
</div>
