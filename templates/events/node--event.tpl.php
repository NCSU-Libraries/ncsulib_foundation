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
    <?php
        $event_date = strtotime($content['field_time']['#object']->field_time['und'][0]['value2']);
        $is_ongoing = ($content['field_ongoing']['#object']->field_ongoing['und'][0]['value'] == 1) ? true : false;
        if($event_date < date('U')):
    ?>
    <div data-alert class="alert-box">
        <i class="fa fa-warning"></i> This event has already happened.
    </div>
    <?php endif; ?>

    <div id="event-node" class="row">
        <div class="columns medium-7">
            <div class="event-meta">
                <?php
                    if(!$is_ongoing){
                        print drupal_render($content['field_time']);
                    }
                    ?>
                <?php print drupal_render($content['field_space']); ?>
                <?php print drupal_render($content['field_non_libraries_space']); ?>
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
            <?php print drupal_render($content['field_event_leads']); ?>
        </div>
    </div>
</article>