<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

    <head>
        <title><?php print $head_title; ?></title>
        <?php include 'includes/head.php'; ?>
    </head>
    <body class="<?php print $classes; ?>" <?php print $attributes;?>>

        <?php include 'includes/header.php'; ?>

        <div class="skip-link">
            <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
        </div>
        <?php print $page_top; ?>
        <?php print $page; ?>
        <?php print $page_bottom; ?>
        <?php print _zurb_foundation_add_reveals(); ?>

        <?php include 'includes/drupal-footer.php'; ?>

    </body>
</html>
