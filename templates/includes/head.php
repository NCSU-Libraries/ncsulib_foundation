<link rel="shortcut icon" href="//lib.ncsu.edu/sites/all/themes/ncsulibraries/favicon.ico" rel="shortcut icon">

<meta charset="utf-8" />
<meta content="ie=edge, chrome=1" http-equiv="x-ua-compatible" />
<meta http-equiv="ImageToolbar" content="false" />

<meta name="viewport" id="viewport" content="width=device-width,minimum-scale=1.0,initial-scale=1.0" />
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/images/homescreen-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/images/homescreen-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/images/homescreen-icon-114x114.png" />
<link rel="image_src" href="//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/images/homescreen-icon-114x114.png" />

<link href="https://cdn.ncsu.edu/brand-assets/fonts/include.css" rel="stylesheet" type="text/css" />

<?php if(!$_SERVER['REMOTE_ADDR']): ?>
<!-- css -->
<link rel="stylesheet" type="text/css" href="//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/styles/core/ncsulib_foundation.css">

<!-- js -->
<script type="text/javascript" src="//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/scripts/vendor/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/scripts/vendor/custom.modernizr.js"></script>
<script type="text/javascript" src="//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/templates/includes/scripts/ncsulib-website.min.js"></script>

<script type="text/javascript">
    // instantiate foundation
    $(function() {
        $(document).foundation();
    });
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17138302-1']);
  _gaq.push(['_setDomainName', 'lib.ncsu.edu']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<?php else: ?>
<?php print $head; ?>
<?php print $styles; ?>
<?php print $scripts; ?>

<script>
  // instantiate foundation
  (function ($, Drupal, window, document, undefined) {
    $(window).load( function (){
      $(document).foundation()
    });
  })(jQuery, Drupal, this, this.document);
</script>
<?php endif; ?>

<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="//webdev.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/styles/core/layout/ie9.css">
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="//code.jquery.com/jquery-1.9.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.1.0.js"></script>
<link rel="stylesheet" type="text/css" href="//webdev.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/styles/core/layout/ie8.css">
<script type="text/javascript" src="//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/scripts/ie8.js"></script>
<script type="text/javascript" src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/scripts/rem.js"></script>
<![endif]-->

<script src="//cdn.ncsu.edu/brand-assets/utility-bar/ub.php?maxWidth=1000&color=red"></script>


