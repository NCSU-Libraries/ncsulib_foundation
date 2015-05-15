<?php
    hide($content['four_liner']);
    hide($content['body']);
    hide($content['field_problem_statement']);
    hide($content['field_assessments']);
    hide($content['field_staff']);
    hide($content['field_featured_image']);
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> capture"<?php print $attributes; ?>>
  <section class="short">

    <div class="short-body">

      <div class="short-title">

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

      </div>

      <?php print render($content['field_teaser']); ?>

    </div>

    <aside class="story-statement-aside sidebar">
      <h2>Story Lead</h2>

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

    <?php print render($content['field_featured_image_landscape']); ?>

  </section>
<!--   <div class="published-date">
    <div class="date">
      <p class="date-posted">Posted on <?php print date('F j, Y', $created); ?></p>
    </div>
  </div> -->

  <?php '';//print $name; ?>

  <?php
    // TODO add Flickr or whatever photo service theming below
    // print render($content['field_flickr_set']);
  ?>

</article>