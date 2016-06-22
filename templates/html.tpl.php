<!DOCTYPE html>
<!--[if IE 7 ]>    <html lang="en" class="no-js lt-ie9 ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js lt-ie9 ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js lt-ie9 ie9" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

    <head>

        <title><?php print $head_title; ?></title>
        <script src="/sites/all/themes/ncsulib_foundation/scripts/vendor/jquery-1.10.2.min.js"></script>
        <script src="/sites/all/themes/ncsulib_foundation/scripts/vendor/custom.modernizr.js"></script>
        <?php include 'includes/head.php'; ?>
    </head>
    <body class="<?php print $classes; ?>" <?php print $attributes;?>>
        <div class="skip-link">
            <a href="#main-content" class="element-focusable"><?php print t('Skip to main content'); ?></a>
        </div>
        <div class="off-canvas-wrap" data-offcanvas>
            <div class="inner-wrap">
                <?php include 'includes/header.php'; ?>

                <?php print $page_top; ?>
                <?php print $page; ?>
                <?php print $page_bottom; ?>

                <?php include 'includes/footer.html'; ?>

            </div>
        </div>
    </body>
</html>
