<link rel="shortcut icon" href="http://lib.ncsu.edu/sites/all/themes/ncsulibraries/favicon.ico" rel="shortcut icon">
<!-- If !Drupal then add static files  -->
<meta charset="utf-8" />
<meta content="ie=edge, chrome=1" http-equiv="x-ua-compatible" />
<meta http-equiv="ImageToolbar" content="false" />
<meta name="viewport" content="width=device-width" />

<?php if(!$_SERVER['REMOTE_ADDR']): ?>
<!-- css -->
<link rel="stylesheet" type="text/css" href="/sites/all/themes/ncsulib_foundation/styles/core/ncsulib_foundation.css">

<!-- js -->
<script src="/sites/all/themes/ncsulib_foundation/scripts/vendor/jquery-1.10.2.min.js"></script>
<script src="/sites/all/themes/ncsulib_foundation/scripts/vendor/custom.modernizr.js"></script>
<script src="/sites/all/themes/ncsulib_foundation/scripts/vendor/foundation.min.js"></script>
<script src="/sites/all/themes/ncsulib_foundation/templates/includes/scripts/ncsulib-website.min.js"></script>
<script type="text/javascript">
    // instantiate foundation
    $(function() {
        $(document).foundation();
    });
</script>

<?php else: ?>
<?php print $head; ?>
<?php print $styles; ?>
<?php print $scripts; ?>
<script>
  // instantiate foundation
(function ($, Drupal, window, document, undefined) {
  $(document).foundation();
})(jQuery, Drupal, this, this.document);
</script>
<?php endif; ?>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
