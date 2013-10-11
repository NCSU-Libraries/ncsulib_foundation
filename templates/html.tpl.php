<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>

  <link rel="stylesheet" type="text/css" href="http://www.ncsu.edu/brand/utility-bar/iframe/css/utility_bar_iframe.css" media="screen" />
  <iframe title="NC State Utility Links" name="ncsu_branding_bar" id="ncsu_branding_bar" frameborder="0" src="http://www.ncsu.edu/brand/utility-bar/iframe/index.php?color=red&amp;inurl=lib.ncsu.edu&amp;center=yes" scrolling="no">
      Your browser does not support inline frames or
      is currently configured  not to display inline frames.<br />
      Visit <a href="http://ncsu.edu/">http://www.ncsu.edu</a>.
  </iframe>

  <div class="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>

  <?php include 'includes/header.html'; ?>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <?php print _zurb_foundation_add_reveals(); ?>

  <?php include 'includes/footer.html'; ?>
  <script>
    (function ($, Drupal, window, document, undefined) {
      $(document).foundation();
    })(jQuery, Drupal, this, this.document);
  </script>
</body>
</html>
