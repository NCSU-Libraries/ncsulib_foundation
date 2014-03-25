<link rel="shortcut icon" href="//lib.ncsu.edu/sites/all/themes/ncsulibraries/favicon.ico" rel="shortcut icon">
<!-- If !Drupal then add static files  -->
<meta charset="utf-8" />
<meta content="ie=edge, chrome=1" http-equiv="x-ua-compatible" />
<meta http-equiv="ImageToolbar" content="false" />
<meta name="viewport" content="width=device-width" />

<?php if(!$_SERVER['REMOTE_ADDR']): ?>
<!-- css -->
<link rel="stylesheet" type="text/css" href="//webdev.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/styles/core/ncsulib_foundation.css">

<!-- js -->
<script src="//webdev.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/scripts/vendor/jquery-1.10.2.min.js"></script>
<script src="//webdev.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/scripts/vendor/custom.modernizr.js"></script>
<script src="//webdev.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/templates/includes/scripts/ncsulib-website.min.js"></script>
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
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
