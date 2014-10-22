<?php
drupal_add_js('jQuery(document).ready(function($) {$(\'iframe\').wrap(\'<div class="video-wrapper"></div>\'); });', 'inline');
?>

<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

    <div class="story">

      <div class="intro">

        <div class="story-title">
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
          <a href="/stories">&crarr; Back to Library Stories</a>
        </div>
        <?php print render($content['field_teaser']); ?>
        <?php print render($content['field_featured_image']); ?>

      </div>

      <div class="story-body">

          <div class="story-statement">
            <?php print $user_picture;?>
            <?php print render($content['field_problem_statement']); ?>
            <?php print render($content['field_featured_image_landscape']); ?>
            <?php print render($content['body']); ?>
            <?php print render($content['field_assessments']); ?>
            <?php print render($content['field_flickr_set']); ?>
            <p class="date-posted">Written on <?php print date('F j, Y', $created); ?></p>
          </div>
          <aside class="story-statement-aside">
            <h3>About the Author</h3>

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