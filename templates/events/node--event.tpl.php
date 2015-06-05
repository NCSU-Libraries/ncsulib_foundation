<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?> itemscope itemtype="http://schema.org/Event">
  <?php if ($title): ?>
  <?php print render($title_prefix); ?>
  <h1 id="page-title" class="title" itemprop="name"><?php print $title; ?></h1>
  <?php print render($title_suffix); ?>
<?php endif; ?>
<?php
    $event_date = strtotime($content['field_time']['#object']->field_time['und'][0]['value2']);
    $is_ongoing = ($content['field_ongoing']['#object']->field_ongoing['und'][0]['value'] == 1) ? true : false;

    if($event_date && $event_date < date('U') && $is_ongoing != '1'){
        print '<div data-alert class="alert-box">';
        print '<i class="fa fa-warning"></i> This event has already happened.';
        print '</div>';
    }
?>

<?php print render($title_prefix); ?>
<?php if (!$page): ?>
  <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
<?php endif; ?>
<?php print render($title_suffix); ?>

    <div id="event-node" class="row">
        <div class="columns medium-7">
            <div class="event-meta">
                <?php
                    // get time
                    $t = field_get_items('node', $node, 'field_time');
                    $adjust = ncsulib_foundation_adjust_for_timezone($t[0]['value']);
                    $start_raw = strtotime($t[0]['value'])+$adjust;
                    $end_raw = strtotime($t[0]['value2'])+$adjust;

                    // get categories to separate out exhibits
                    $cat = field_get_items('node', $node, 'field_event_category');
                    foreach($cat as $c){
                        $time = ($c['value'] == 'Exhibits') ? '' : date('g:ia',$start_raw).' - '.date('g:ia',$end_raw);
                    }
                    if(!$cat){$time = date('g:ia',$start_raw).' - '.date('g:ia',$end_raw);}
                    $str = (date('z',$start_raw) == date('z',$end_raw)) ? date('F j, Y',$start_raw) : date('F j',$start_raw).' - '.date('F j, Y',$end_raw);
                    if(!$is_ongoing){
                        echo '<h3>When</h3>';
                        echo '<p itemprop="startDate" content="'.date('c',$start_raw).'">'.$str.'<br/>'.$time.'</p>';
                    }
                ?>
                <?php
                    // space
                    $node = node_load($nid);
                    $field = field_get_items('node', $node, 'field_space');
                    $space_title = $field[0]['entity']->title;

                    // building address
                    $space_node = field_get_items('node', $node, 'field_space');
                    $b_nid = $space_node[0]['entity']->field_building_new_['und'][0]['target_id'];
                    $b_node = node_load($b_nid);
                    $b_title = $b_node->title;
                    $b_address = field_get_items('node', $b_node, 'field_address');
                    $b_address = $b_address[0]['value'];
                ?>
                <div itemprop="location" itemscope itemtype="http://schema.org/Place">
                    <div itemprop="name" content="<?= $space_title ?>"><?php print drupal_render($content['field_space']); ?></div>
                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="hide">
                        <div itemprop="name"><?= $b_title ?></div>
                        <div itemprop="streetAddress"><?= $b_address; ?></div>
                    </div>
                </div>
                <?php print drupal_render($content['field_non_libraries_space']); ?>
            </div>

            <div itemprop="description"><?php print drupal_render($content['body']); ?></div>

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
            <div itemprop="image"><?php print drupal_render($content['field_image_for_event']); ?></div>
            <?php print drupal_render($content['field_event_leads']); ?>
        </div>
    </div>
</article>