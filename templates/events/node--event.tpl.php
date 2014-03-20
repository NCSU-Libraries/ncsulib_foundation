<?php
  /**
   * Event node
   * Author: Charlie Morris
   * Date: 3/28/13
   */
  drupal_add_css(drupal_get_path('theme', 'ncsulib_foundation').'/styles/event.css');
?>

<?php //print_r($node); ?>
<?php
    $time = field_get_items('node', node_load($node->nid), 'field_time');
    $start = date('F j, Y', strtotime($time[0]['value']));
    $end = date('F j, Y', strtotime($time[0]['value2']));
    $start_time = date('g:ia', strtotime($time[0]['value']));

    $space_nid = $node->field_space['und'][0]['target_id'];
    $space_node = node_load($space_nid);

    $img = $node->field_image_for_event['und'][0]['uri'];

    // contact
    $name = $node->field_contact_name['und'][0]['value'];
    $phone = $node->field_contact_phone['und'][0]['value'];
    $email = $node->field_contact_email['und'][0]['email'];
?>
<h1><?php echo $title; ?></h1>
<div id="event-node" class="row">
    <div class="columns large-7">
        <div class="event-meta">
            <h5><strong>When:</strong> <?php echo $date = ($end) ? $start . ' to ' . $end . ', '.$start_time : $start.', '.$start_time; ?></h5>
            <h5 class="subheader"><strong>Where:</strong> <?php echo 'at the <a href="/node/' . $space_nid  . '">' . $space_node->title . '</a>'; ?></h5>
        </div>
        <?php echo $node->body['und'][0]['value']; ?>
        <div class="contact">
            <?php if($name || $phone || $email): ?>
            <h3>Contact Info</h3>
            <p>
                <?php echo $node->field_contact_name['und'][0]['value']; ?><br />
                <?php echo $node->field_contact_phone['und'][0]['value']; ?><br />
                <?php echo $node->field_contact_email['und'][0]['email']; ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
    <div class="columns large-5">
        <?php if($img): ?>
        <img src="<?php echo image_style_url('half-page-width', $img); ?>" width="100%" alt="<?php echo $node->title; ?>" />
        <?php endif; ?>
    </div>
</div>
