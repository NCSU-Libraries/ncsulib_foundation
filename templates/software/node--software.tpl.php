<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
    <?php if ($title): ?>
        <?php print render($title_prefix); ?>
            <h1 id="page-title" class="title"><?php print $title; ?></h1>
        <?php print render($title_suffix); ?>
    <?php endif; ?>

    <div class="content"<?= $content_attributes; ?>>
    <?php
      // We hide the comments and links because we will not use them.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_featured_image']);
      hide($content['field_application_icon']);
      hide($content['field_platform']);
      hide($content['field_documentation_url']);

      // if sidebar has content
      if($content['field_application_icon'] || $content['field_platform'] || $content['field_documentation_url']){
        $sidebar = true;
        $main_classes = 'medium-9 push-3';
      } else{
        $sidebar = false;
        $main_classes = 'medium-12';
      }

    ?>

    <div class="row">
        <div id="main-content" class="<?=$main_classes?> main columns">
            <?= render($content); ?>
        </div>
        <?php if($sidebar){ ?>
        <aside id="subnav" class="medium-3 pull-9 l-sidebar-first columns sidebar" role="complementary">
            <?= render($content['field_application_icon']); ?>
            <?= render($content['field_platform']); ?>
            <?= render($content['field_documentation_url']); ?>
        </aside>
        <?php } ?>
    </div>


    </div>

</article>