<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=208495345881552";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?> itemscope itemtype="http://schema.org/Event">
  <?php if ($title): ?>
  <?= render($title_prefix); ?>
  <h1 id="page-title" class="title" itemprop="name"><?php print $title; ?></h1>
  <?= render($title_suffix); ?>
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

<?= render($title_prefix); ?>
<?php if (!$page): ?>
  <h2<?= $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
<?php endif; ?>
<?= render($title_suffix); ?>

    <div id="event-node" class="row">
        <div class="columns medium-7">
            <div class="event-meta">
                <?php
                    // get time
                    $t = field_get_items('node', $node, 'field_time');
                    $adjust = ncsulib_foundation_adjust_for_timezone($t[0]['value']);
                    $start_raw = strtotime($t[0]['value'])+$adjust;
                    $end_raw = strtotime($t[0]['value2'])+$adjust;
                    $duration = $end_raw - $start_raw;
                    $d_hour = floor($duration/60/60);
                    $d_min = ($duration/60/60 - $d_hour)*60;

                    // get categories to separate out exhibits
                    $cat = field_get_items('node', $node, 'field_event_category');
                    foreach($cat as $c){
                        $time = ($c['value'] == 'Exhibits') ? '' : date('g:ia',$start_raw).' - '.date('g:ia',$end_raw);
                    }
                    if(!$cat){$time = date('g:ia',$start_raw).' - '.date('g:ia',$end_raw);}
                    $str = (date('z',$start_raw) == date('z',$end_raw)) ? date('F j, Y',$start_raw) : date('F j',$start_raw).' - '.date('F j, Y',$end_raw);
                    if(!$is_ongoing){
                        echo '<h3>When</h3>';
                        echo '<p>';
                        echo '<time itemprop="startDate" datetime="'.date('Y-m-d',$start_raw).'T'.date('G:i',$start_raw).'">'.$str.'<br/>'.$time.'</time>';
                        echo '<time itemprop="duration" datetime="T'.$d_hour.'H'.$d_min.'M"></time>';
                        echo '</p>';
                    }
                ?>
                <?= drupal_render($content['field_space']); ?>
                <?= drupal_render($content['field_non_libraries_space']); ?>

            </div>

            <div itemprop="description"><?php print drupal_render($content['body']); ?></div>

            <!-- contact -->
            <?php if( isset($content['field_contact_name']) || isset($content['field_contact_phone']) || isset($content['field_contact_email'])): ?>
            <div class="contact-info">
                <h3>Contact Information</h3>
                <div class="contact-details">
                    <?= drupal_render($content['field_contact_name']); ?>
                    <?= drupal_render($content['field_contact_phone']); ?>
                    <?= drupal_render($content['field_contact_email']); ?>
                </div>
            </div>
            <?php endif; ?>
            <?= drupal_render($content['field_admission_information']); ?>
            <?= drupal_render($content['field_other_information']); ?>


        </div>
        <div class="columns medium-5">
            <?php if($node->field_image_for_event): ?>
            <?= '<img src="'.image_style_url('large', $node->field_image_for_event['und'][0]['uri']).'" width="100%" itemprop="image" />' ?>
            <?php endif; ?>
            <?= drupal_render($content['field_event_leads']); ?>
        </div>
    </div>
</article>