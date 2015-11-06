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


  <div class="content row"<?php print $content_attributes; ?>>

    <?php
      // We hide the comments and links because we will not use them.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_db_teaser']);
      hide($content['field_librarian']);
      hide($content['field_open_tagging']);


    ?>


    <div class="columns medium-6 push-3">
      <?= render($content); ?>
    </div>
    <aside class="columns medium-3 pull-3">
        <?php
            $content['field_librarian'];
        ?>
    </aside>
    <div class="columns medium-3">
        <?php
            $content['field_open_tagging'];
        ?>
    </div>

  </div>

</article>