<?php
  drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/vendor/foundation/foundation.interchange.js', array('scope'=>'footer'));
?>

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
    // We hide the comments and links because we will not use them.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
    hide($content['field_photos']);
?>
  <div class="row" id="carousel-wrap">
    <div class="columns medium-8">
    <?php if(render($content['field_photos'])): ?>
      <?= render($content['field_photos']) ?>
    <?php endif; ?>
    </div>
    <div class="columns medium-4">
    <?php if(render($content['field_tags'])): ?>
      <div id="proj-url">
        <a href="" class="button small styled expand">Here's our project</a>
      </div>
    <?php endif; ?>
    <?php if(render($content['field_project_author_s_'])): ?>
      <div id="proj-authors">
        <h3>We Made This</h3>
        <?= render($content['field_project_author_s_']) ?>
      </div>
    <?php endif; ?>
    </div>
  </div>
  <div class="row">
    <div class="columns medium-12">
    <?php if(render($content)): ?>
    <h2>Summary</h2>
      <?= render($content) ?>
    </div>
    <?php endif; ?>
  </div>

</article>
