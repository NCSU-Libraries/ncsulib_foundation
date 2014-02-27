<?php
  drupal_add_css(drupal_get_path('theme', 'ncsulibraries').'/styles/node-technology_categories.css');
  hide($content['comments']);
  hide($content['links']);
  hide($content['body']);
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

    <ul class="breadcrumbs">
      <li><a href="/">Home</a></li>
      <li><a href="/techlending">Technology Lending</a></li>
      <li class="current"><?php print $title; ?></li>
    </ul>


    <?php print render($content);

    // 22469 is the nid for DSLRs
    if ($node->nid == 22469) {
      print render($content['body']);
    }
    ?>

</div>
