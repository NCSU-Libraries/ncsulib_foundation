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

    <div id="event-node" class="row">
        <div class="columns medium-7">
            <div class="event-meta">
                <?php print drupal_render($content['field_time']); ?>

                <?php
                    // Loading date from the associated space node, including title,
                    // building_name and, if CVRL, the body
                    if (!empty($node->field_space)) {
                        $space_nid = $node->field_space['und'][0]['target_id'];
                        $space_node = node_load($space_nid);
                        // The nid of the related space
                        $space_nid = $node->field_space['und'][0]['target_id'];

                        // Load the node into the page
                        $space_node = node_load($space_nid);

                        // Get the node items that we're interested in
                        $building_field = field_get_items('node', $space_node, 'field_building_name');
                        $space_body = field_get_items('node', $space_node, 'body');

                        // Display related node's fields
                        print '<h3>Where</h3><p>The <a href="/node/' . $space_nid  . '">' . $space_node->title . '</a>';
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
                      print '</p>';
                    }

                ?>
            </div>

            <?php print drupal_render($content['body']); ?>

            <!-- contact -->
            <?php if( isset($content['field_contact_name']) || isset($content['field_contact_phone']) || isset($content['field_contact_email'])): ?>
            <div class="contact-info">
                <h3>Contact Information</h3>
                <div class="contact-details">
                    <?php print drupal_render($content['field_contact_name']); ?>
                    <?php print drupal_render($content['field_contact_phone']); ?>
                    <?php print drupal_render($content['field_contact_email']); ?>
                </div>
            </div>
            <?php endif; ?>
            <?php print drupal_render($content['field_admission_information']); ?>
            <?php print drupal_render($content['field_other_information']); ?>


        </div>
        <div class="columns medium-5">
            <?php print drupal_render($content['field_image_for_event']); ?>
        </div>
    </div>
</article>