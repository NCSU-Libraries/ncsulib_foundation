<link rel="shortcut icon" href="/sites/all/themes/ncsulibraries/favicon.ico" rel="shortcut icon">
<!-- If !Drupal then add static files  -->
<?php if(!$_SERVER['REMOTE_ADDR']): ?>
<meta charset="utf-8" />
<meta content="ie=edge, chrome=1" http-equiv="x-ua-compatible" />
<meta http-equiv="ImageToolbar" content="false" />
<meta name="viewport" content="width=device-width" />

<!-- css -->
<link rel="stylesheet" type="text/css" href="/sites/all/themes/ncsulib_foundation/styles/core/ncsulib_foundation.css">

<!-- js -->
<script src="/sites/all/themes/ncsulib_foundation/scripts/vendor/foundation.min.js"></script>
<script type="text/javascript">
    // instantiate foundation
    (function ($) {
        $(document).foundation();
    })(jQuery);
</script>

<?php else: ?>
<?php print $head; ?>
<?php print $styles; ?>
<?php print $scripts; ?>
<script src="/sites/all/themes/ncsulib_foundation/scripts/global.js"></script>
<?php endif; ?>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
