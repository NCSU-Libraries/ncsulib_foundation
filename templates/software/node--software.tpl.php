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

        print render($content);
    ?>

    <div class="row">
        <div class="columns medium-9">
            <?= drupal_render($content['body']); ?>
            <?= drupal_render($content['field_how_to_access']); ?>
            <?= drupal_render($content['field_software_devices']); ?>
            <?= drupal_render($content['field_software_spaces']); ?>
            <?= drupal_render($content['field_documentation_urlt']); ?>
        </div>
        <div class="columns medium-3">
            <?= drupal_render($content['field_application_icon']); ?>
            <?= drupal_render($content['field_version']); ?>
            <?= drupal_render($content['field_platform']); ?>
        </div>
    </div>

</article>
