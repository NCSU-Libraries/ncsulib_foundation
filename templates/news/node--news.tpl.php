<?php if($teaser):
    include_once 'mailchimp--news--teaser.tpl.php';
?>
<?php else: ?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?> itemscope itemtype="http://schema.org/NewsArticle">
    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
        <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
            <meta itemprop="url" content="http://webdev.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/images/ncsu-library-logo-white.png">
            <meta itemprop="width" content="600">
            <meta itemprop="height" content="60">
        </div>
        <meta itemprop="name" content="North Carolina State University Library">
    </div>

    <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
        <h3<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
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
                <h1 id="page-title" class="title" itemprop="headline"><?php print $title; ?></h1>
            <?php print render($title_suffix); ?>
        <?php endif; ?>
        <div id="meta" class="row">
            <div class="columns medium-4 small-6">
                <span itemprop="author" content="NC State Library Staff"></span>
                <?=  '';//$name; ?>
                <div id="post-date"><small itemprop="datePublished"><?= date('F j, Y',strtotime(format_date($node->created, 'page'))); ?></small></div>
                <span itemprop="dateModified" content="<?= date('F j, Y',strtotime(format_date($node->created, 'page'))); ?>"></span>
            </div>
            <div class="columns medium-4 small-6 left">
                <div id="social">
                    <div id="social-btns">
                        <a id="fb-share-button" data-url="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                        <a id="tw-share-button" data-url="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                        <!-- <a id="gplus-share-button" data-url="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" href="#"><i class="fa fa-google-plus-square fa-2x"></i></a> -->
                        <a id="email-button" data-url="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" href="#"><i class="fa fa-envelope-square fa-2x"></i></a>
                    </div>
                    <h4 class="subheader">Share</h4>
                </div>
            </div>
        </div>
    </div>
    <div id="post-content" class="columns medium-8" itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="https://google.com/article">
       <div id="feature-photo" class="row">
            <div class="columns medium-12">
                <?= render($content['field_news_feature_photo']); ?>
            </div>
        </div>
        <div itemprop="articleBody">
            <?= render($content); ?>
        </div>
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
<?php endif; ?>