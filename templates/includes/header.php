<?php
  define('DRUPAL_ROOT', '/var/www/webdev/drupal');
  require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
  drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
?>
<?php //print $styles; ?>

<div class="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>

<link rel="stylesheet" type="text/css" href="http://www.ncsu.edu/brand/utility-bar/iframe/css/utility_bar_iframe.css" media="screen" />
<iframe title="NC State Utility Links" name="ncsu_branding_bar" id="ncsu_branding_bar" frameborder="0" src="http://www.ncsu.edu/brand/utility-bar/iframe/index.php?color=red&amp;inurl=lib.ncsu.edu&amp;center=yes" scrolling="no">
	Your browser does not support inline frames or is currently configured  not to display inline frames.<br /> Visit <a href="http://ncsu.edu/">http://www.ncsu.edu</a>.
</iframe>

<?php include 'mobile-nav.php'; ?>

<header class="contain-to-grid">
	<nav class="top-bar">
		<ul class="title-area">
			<li class="name">
			  	<a href="/" title="<?php print t('NCSU Library'); ?>" rel="home" id="logo">
					<img src="/sites/all/themes/ncsulib_foundation/images/ncsu-library-logo-white.png" alt="<?php print t('Home'); ?>" />
			  	</a>
			</li>
			<li id="nav-toggle">
				<a href="#"><i class="icon-reorder"></i></a>
			</li>
			<li id="search-toggle">
				<a href="#"><i class="icon-search"></i></a>
			</li>
		</ul>

		<section class="top-bar-section primary-nav home">
			<?php include 'primary-nav.php'; ?>
		</section>
	</nav>
</header>

<nav id="primary-nav-menus">
	<div id="menu-find" class="primary-menu-list" >
		<ul>
			<li><a href="/catalog">Books &amp; Media</a></li>
			<li><a href="/articles">Articles</a></li>
			<li><a href="/journals">Journal Titles</a></li>
			<li><a href="/databases">Databases</a></li>
			<li><a href="https://reserves.lib.ncsu.edu">Course Reserves</a></li>
		</ul>
		<ul>
			<li><a href="/data">Spatial &amp; Numerical Data</a></li>
			<li><a href="/specialcollections">Special Collections</a></li>
			<li><a href="/repository">NC State Publications</a></li>
			<li><a href="/repository">Theses &amp; Dissertations</a></li>
		</ul>
	</div>
	<div id="menu-help" class="primary-menu-list">
		<ul>
			<li><a href="/askus">Ask Us</a></li>
			<li><a href="/researchconsultation">Research Consultation</a></li>
			<li><a href="/digital-media-lab/techconsult">Technology Consultation</a></li>
			<li><a href="/researchworkshops">Research Workshops</a></li>
			<li><a href="/cdsc">Copyright Guidance</a></li>
		</ul>
		<ul>
			<li><a href="/course">Course Tools</a></li>
			<li><a href="/tools-citation">Citation</a></li>
			<li><a href="/reference-tools">Reference</a></li>
			<li><a href="/guides">Guides</a></li>
			<li><a href="/tutorials">Tutorials</a></li>
		</ul>
	</div>
	<div id="menu-services" class="primary-menu-list">
		<ul>
			<li><a href="/borrow">Borrow, Renew, Request</a></li>
			<li><a href="/computing">Computing</a></li>
			<li><a href="/digital-media-lab">Create Digital Media</a></li>
			<li><a href="/disabilityservices">Disability Services</a></li>
			<li><a href="/distance">Distance Learning</a></li>
			<li><a href="/faculty">Faculty/Instructor Support</a></li>
		</ul>
		<ul>
			<li><a href="/groupfinder">GroupFinder</a></li>
			<li><a href="/reservearoom">Reserve a Room</a></li>
			<li><a href="/printing">Print, Copy, Scan</a></li>
			<li><a href="/collections/suggestpurchase">Suggest a Purchase</a></li>
			<li><a href="/techlending">Technology Lending</a></li>
			<li><a href="/tripsaver">Tripsaver</a></li>
		</ul>
	</div>
	<div id="menu-libraries" class="primary-menu-list">
		<ul>
			<li><a href="/">D. H. Hill Library</a></li>
			<li><a href="/huntlibrary">James B. Hunt Jr. Library</a></li>
			<li><a href="/design">Design Library</a></li>
			<li><a href="/nrl">Natural Resources Library</a></li>
			<li><a href="/vetmed">Veterinary Medicine Library</a></li>
		</ul>
	</div>
	<div id="menu-about" class="primary-menu-list">
		<ul>
			<li><a href="/contact">Contact Us</a></li>
			<li><a href="/parking">Directions &amp; Parking</a></li>
			<li><a href="/hours">Hours</a></li>
			<li><a href="/jobs">Jobs</a></li>
		</ul>
		<ul>
			<li><a href="/staff">Staff</a></li>
			<li><a href="/directories">Directories</a></li>
			<li><a href="/giving/friends">Friends of the Library</a></li>
			<li><a href="/specialcollections">Special Collections</a></li>
		</ul>
	</div>
</nav>

<section id="utility">
	<div id="utility-bar">
		<?php if(drupal_is_front_page()): ?>
		<div id="home-hours">
			<p id="hours-title"><a href="/hours">TODAYS HOURS</a>:</p>
			<ul>
				<li><a href="/hours/general/hill"><span class="library">D. H. Hill:</span> &nbsp; <span class="hours">Open 24 Hours</span></a></li>
				<li><a href="/hours/general/hunt"><span class="library">James B. Hunt Jr.:</span> &nbsp; <span class="hours">Open 24 Hours</span></a></li>
			</ul>
		</div>
		<?php else: ?>
		<div id="utility-search">
			<form id="search-form" accept-charset="utf-8" method="get" action="/search/" tabindex="1">
				<input type="text" id="search-all" name="q" class="main-search-field search-header" placeholder="Search books, articles, journals, &amp; library website">
				<input type="submit" id="search-submit" value="SEARCH">
			</form>
		</div>
		<?php endif; ?>
		<?php include 'utility-links.php'; ?>
	</div>
</section>
