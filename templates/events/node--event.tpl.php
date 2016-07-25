<?php drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/events.js'); ?>

<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?> itemscope itemtype="http://schema.org/Event">
  <?php if ($title): ?>
  <?= render($title_prefix); ?>
  <h1 id="page-title" class="title" itemprop="name"><?php print $title; ?></h1>
  <?= render($title_suffix); ?>
<?php endif; ?>
<div id="event-share">
    <a id="fb-share-button" data-url="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
    <a id="tw-share-button" data-url="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
</div>
<?php

    //is there a sidebar?
    if($node->field_image_for_event || $content['field_event_leads']){
        $sidebar = true;
        $first_column = 'medium-7';
    } else{
        $sidebar = false;
        $first_column = 'medium-12';
    }
?>

<?= render($title_prefix); ?>
<?php if (!$page): ?>
  <h2<?= $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
<?php endif; ?>
<?= render($title_suffix); ?>

    <div id="event-node" class="row">
        <div class="columns <?=$first_column?>">
            <div class="event-meta">
                <?php
                        //did this event already happen?
                        $event_date = strtotime($content['field_time']['#object']->field_time['und'][count($content['field_time']['#object']->field_time['und'])-1]['value2'])+timezoneOffset();
                        $is_ongoing = ($content['field_ongoing']['#object']->field_ongoing['und'][0]['value'] == 1) ? true : false;

                        if($event_date && $event_date < date('U') && $is_ongoing != '1'){
                            print '<div data-alert class="alert-box">';
                            print '<i class="fa fa-warning"></i> This event has already happened.';
                            print '</div>';
                        }
                ?>
                <?= drupal_render($content['field_time']); ?>
                <h3>Where</h3>
                <?= drupal_render($content['field_space']); ?>
                <?= drupal_render($content['field_non_libraries_space']); ?>
            </div>

            <div itemprop="description" id="event-description"><?php print drupal_render($content['body']); ?></div>

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
        <?php if($sidebar): ?>
        <div class="columns medium-5">
            <?php if($node->field_image_for_event): ?>
                <?= '<img property="og:image" src="'.image_style_url('large', $node->field_image_for_event['und'][0]['uri']).'" width="100%" itemprop="image" />' ?>
                <small><?= $node->field_image_for_event['und'][0]['alt'] ?></small>
            <?php elseif($node->field_event_teaser_photo): ?>
                <?= '<img property="og:image" src="'.image_style_url('large', $node->field_event_teaser_photo['und'][0]['uri']).'" width="100%" itemprop="image" />' ?>
                <small><?= $node->field_image_for_event['und'][0]['alt'] ?></small>
            <?php endif; ?>

            <?= drupal_render($content['field_event_leads']); ?>
        </div>
        <?php endif; ?>
    </div>
</article>

