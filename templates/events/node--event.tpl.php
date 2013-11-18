<?php
    /**
    * Event node
    * Author: Charlie Morris
    * Date: 3/28/13
    */
    drupal_add_css(drupal_get_path('theme', 'ncsulibraries').'/styles/event.css');
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix" <?php print $attributes; ?>>

    <?php if (!$page): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>


    <div class="content"<?php print $content_attributes; ?>>
        <?php
            hide($content['field_event_start']);
            hide($content['links']);
            hide($content['field_space']);
            hide($content['field_time']);

            $node_type = field_get_items('node', node_load($node->nid), 'field_event_category');
            $type = ($node_type[0]['value'] == 'Exhibits') ? 'exhibits' : 'event';
        ?>
        <?php if ($field_image_for_event): ?>
            <?php print render($content['field_image_for_event']); ?>
        <?php elseif ($field_adx_image): ?>
            <?php print '<img class="image-outline" src="'. $field_adx_image['und']['0']['safe_value'] .'">'; ?>
        <?php endif; ?>

        <div class="event-details">
            <?php
                // Dealing with legacy data, print the new time field field_time if it
                // is present otherwise print the legacy field for time
                // field_event_start
                if ($type == 'exhibits') {
                    echo '<div class="meta"><p>';
                    //  If it's an exhbit we don't need the time of day, just date.
                    $time = field_get_items('node', node_load($node->nid), 'field_time');
                    $start = date('F j, Y', strtotime($time[0]['value']));
                    $end = date('F j, Y', strtotime($time[0]['value2']));
                    echo '<strong>When</strong>: '.$start.' to '.$end;
                } else {
                    echo $field_time ? render($content['field_time']) : render($content['field_event_start']);
                }
            ?>

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
                    print '<div class="at"><strong>Where:</strong> The <a href="/node/' . $space_nid  . '">' . $space_node->title . '</a>';
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
                    print '</p></div></div>';
                }
            ?>
        <?php print render($content); ?>
        </div> <!-- end .event-details -->
    </div>
</div>
