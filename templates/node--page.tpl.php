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


  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links because we will not use them.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_featured_image']);

      // Set the featured image based on whether or not a sidebar is present
      // on the left.  I don't see a way around this.  You can't call
      // image_style_url() from a preprocess, so I'm left with having to write
      // logic into a tpl file.
      $featured_image = isset($content['field_featured_image'][0]) ? TRUE : FALSE;
      if ($featured_image){
        $sidebar_first  = isset($variables['sidebar_first']) ? TRUE : FALSE;
        $image_style    = $sidebar_first ? 'quarter-page-width' : 'half-page-width';
        $featured_image_uri = $content['field_featured_image'][0]['#item']['uri'];
        $featured_image_url = image_style_url($image_style, $featured_image_uri);
        $alt      = $content['field_featured_image']['#items'][0]['alt'];
        $caption  = $content['field_featured_image']['#items'][0]['title'];
        print '<div class="featured-image"><img src="'. $featured_image_url .'" alt="'. $alt .'">';
        if (!empty($caption)){
          print '<p>'. $caption . '</p>';
        }
        print '</div>';
      }
      print render($content);
    ?>

  </div>

</article>