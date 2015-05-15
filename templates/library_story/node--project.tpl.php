<?php
  drupal_add_js('jQuery(document).ready(function($) {$(\'iframe\').wrap(\'<div class="video-wrapper"></div>\'); });', 'inline');
  hide($content['four_liner']);
  hide($content['field_featured_image']);
  hide($content['field_featured_image_landscape']);
  hide($content['field_assessments']);
  hide($content['field_flickr_set']);
  hide($content['field_problem_statement']);
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

    <div class="story">

      <div class="intro">
        <div class="story-title">
          <?php if ($title): ?>
          <?php print render($title_prefix); ?>
          <p><a href="/stories">&larr; Back to Library Stories</a></p>
          <h1 id="page-title" class="title"><?php print $title; ?></h1>
            <?php print render($title_suffix); ?>
          <?php endif; ?>

          <?php print render($title_prefix); ?>
          <?php if (!$page): ?>
            <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
        </div>
        <?php
          $photo_url = $content['field_featured_image_landscape']['#object']->field_featured_image_landscape['und'][0]['filename'];
          $alt = $content['field_featured_image_landscape']['#object']->field_featured_image_landscape['und'][0]['alt'];
          $title = $content['field_featured_image_landscape']['#object']->field_featured_image_landscape['und'][0]['title'];
        ?>
        <div id="featured-image">
          <img src="/sites/default/files/<?= $photo_url; ?>" width="100%" alt="<?= $alt; ?>">
          <?php if($title){ echo '<small>'.$title.'</small>';} ?>
        </div>
        <?php print render($content['field_teaser']); ?>

      </div>

      <div class="story-body">

          <div class="story-statement">
            <?php print render($content['field_body']); ?>
            <p class="date-posted">Written on <?php print date('F j, Y', $created); ?></p>
          </div>
          <aside class="story-statement-aside sidebar">
            <h3>Story Lead</h3>

            <?php print $name; ?>
            <?php print render($content['field_staff']); ?>
            <?php print render($content); ?>
            <?php
              // Printing the contents of a block to a page template
              // See https://www.drupal.org/node/26502
              $block = module_invoke('views', 'block_view', 'capture_and_promote-block_4');
              print '<h3>' . $block['subject'] . '</h3>';
              print render($block['content']);
            ?>
            <p class="subscribe"><i class="fa fa-rss-square"></i> <a href="/stories.rss">Subscribe to NCSU Library Stories</a><p>

          </aside>
        </div>

      </div>

    </div>

</article>