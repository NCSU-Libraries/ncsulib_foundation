<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

    <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <div class="content row"<?php print $content_attributes; ?>>
    <?php
        // We hide the comments and links because we will not use them.
        hide($content['comments']);
        hide($content['field_news_categories']);
        hide($content['field_news_tags']);
    ?>

    <div class="columns medium-12">
        <?php if ($title): ?>
            <?php print render($title_prefix); ?>
                <h1 id="page-title" class="title"><?php print $title; ?></h1>
            <?php print render($title_suffix); ?>
        <?php endif; ?>
        <div id="meta" class="row">
            <div class="columns medium-6">
                <?php print $name; ?>
                <div id="post-date"><small><?php print date('F j, Y',strtotime(format_date($node->created, 'page'))); ?></small></div>
            </div>
            <div class="columns medium-6 left">
                <div id="social">
                    <!-- <h2 class="subheader">Share</h2> -->
                    <a id="fb-share-button" data-url="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                    <a id="tw-share-button" data-url="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                    <!-- <a id="gplus-share-button" data-url="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" href="#"><i class="fa fa-google-plus-square fa-2x"></i></a> -->
                    <a id="email-button" data-url="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" href="#"><i class="fa fa-envelope-square fa-2x"></i></a>
                </div>
            </div>
        </div>
        <div id="feature-photo" class="row">
            <div class="columns medium-12">
                <?= render($content['field_news_feature_photo']); ?>
            </div>
        </div>
    </div>
    <div id="post-content" class="columns medium-8">
        <?= render($content); ?>
    </div>
    <aside id="post-sidebar" class="columns medium-4">

        <?php if(!empty($content['field_news_tags']['#object'])): ?>
            <div id="tags">
                <?= render($content['field_news_tags']); ?>
            </div>
        <?php endif; ?>
        <?php
            // other news block
            $blockObject = block_load('views', 'news-block_4');
            $block = _block_get_renderable_array(_block_render_blocks(array($blockObject)));
            $output = drupal_render($block);
            print $output;

            // upcoming events block
            $blockObject = block_load('views', 'upcoming_events-block_8');
            $block = _block_get_renderable_array(_block_render_blocks(array($blockObject)));
            $output = drupal_render($block);
            print $output;
        ?>

    </aside>

  </div>

</article>