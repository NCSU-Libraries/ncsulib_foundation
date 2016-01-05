<?php include 'ncsu-brand-bar.php'; ?>

<?php

	// $_SERVER['REMOTE_ADDR'] is only set when a PHP page is rendered by Apache,
	// When PHP runs from the command line it is unset
  	if(php_sapi_name() == 'cli'){
		$_SERVER['REMOTE_ADDR'] = '';
		$path = getcwd();
		$split = explode('/', $path);
		$domain = $split[3]; //webdev or site
		$domain_path = '/var/www/'.$domain.'/drupal/';

		// If we move header.php somewhere else in the file tree this will break!
		// $magic_number = strlen("/sites/all/themes/ncsulib_foundation/templates/includes/header.php");
  		// define('DRUPAL_ROOT', substr(__FILE__, 0, -$magic_number));
  		define('DRUPAL_ROOT', $domain_path);

  		// Boot drupal so t() functions and other drupal functions run
  		require_once (DRUPAL_ROOT.'/includes/bootstrap.inc');
  		drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
  	}
?>
<header class="contain-to-grid" role="banner">
	<div class="top-bar">
		<div class="title-area">
			<div class="name">
			  	<a href="//www.lib.ncsu.edu" title="<?php print t('NCSU Library'); ?>" rel="home" id="logo">
					<img src="//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/images/ncsu-library-logo-white.png" alt="<?php print t('Home'); ?>" />
			  	</a>
			</div>
			<nav id="nav-toggle" class="right-off-canvas-toggle" role="navigation" aria-label="mobile navigation">
				<!-- <a href="#" id="hamburger-nav" class="hide"><i class="fa fa-bars"></i>menu</a> -->
				<a href="#" id="menu-nav">menu</a>
			</nav>
			<span id="search-toggle">
				<a href="#"><i class="fa fa-search"></i> src </a>
			</span>
		</div>

		<nav class="top-bar-section primary-nav home" role="navigation" aria-label="main navigation">
			<?php include 'primary-nav.php'; ?>
		</nav>
	</div>

	<?php include 'mobile-nav.php'; ?>
</header>

<nav id="primary-nav-menus" role="navigation" aria-label="main navigation">
	<div id="menu-find" class="primary-menu-list" >
		<ul>
			<li><a href="//www.lib.ncsu.edu/data">Data and GIS</a></li>
			<li><a href="//www.lib.ncsu.edu/specialcollections">Special Collections</a></li>
			<li><a href="//www.lib.ncsu.edu/repository">NC State Publications</a></li>
			<li><a href="//www.lib.ncsu.edu/repository">Theses &amp; Dissertations</a></li>
		</ul>
		<ul>
			<li><a href="//www.lib.ncsu.edu/catalog">Books &amp; Media</a></li>
			<li><a href="//www.lib.ncsu.edu/articles">Articles</a></li>
			<li><a href="//www.lib.ncsu.edu/journals">Journal Titles</a></li>
			<li><a href="//www.lib.ncsu.edu/databases">Databases</a></li>
			<li><a href="//reserves.lib.ncsu.edu/auth/">Course Reserves</a></li>
			<li><a href="//www.lib.ncsu.edu/textbookservice/">Textbooks</a></li>
		</ul>
	</div>
	<div id="menu-help" class="primary-menu-list">
		<ul>
			<li><a href="//www.lib.ncsu.edu/course">Course Tools</a></li>
			<li><a href="//www.lib.ncsu.edu/tools-citation">Citation</a></li>
			<li><a href="//www.lib.ncsu.edu/guides">Guides</a></li>
			<li><a href="//www.lib.ncsu.edu/tutorials">Videos and Tutorials</a></li>
		</ul>
		<ul>
			<li><a href="//www.lib.ncsu.edu/askus">Ask Us</a></li>
			<li><a href="//www.lib.ncsu.edu/services/research-support">Research Support</a></li>
			<li><a href="//www.lib.ncsu.edu/digital-media-lab/techconsult">Technology Consultation</a></li>
			<li><a href="//www.lib.ncsu.edu/events/classes/research-support">Research Workshops</a></li>
			<li><a href="//www.lib.ncsu.edu/cdsc">Copyright Guidance</a></li>
		</ul>
	</div>
	<div id="menu-services" class="primary-menu-list">
		<ul>
			<li><a href="//www.lib.ncsu.edu/services/research-support">Research Support</a></li>
			<li><a href="//www.lib.ncsu.edu/faculty">Faculty/Instructors</a></li>
			<li><a href="//www.lib.ncsu.edu/graduatestudents">Graduate Students</a></li>
			<li><a href="//www.lib.ncsu.edu/distance">Distance Learners</a></li>
			<!-- <li><a href="//www.lib.ncsu.edu/disabilityservices">Disability Services</a></li> -->
		</ul>
		<ul>
			<li><a href="//www.lib.ncsu.edu/reservearoom">Reserve a Room</a></li>
			<li><a href="//www.lib.ncsu.edu/groupfinder">GroupFinder</a></li>
		</ul>
		<ul>
			<li><a href="//www.lib.ncsu.edu/services/digital-media-production">Digital Media Production</a></li>
			<li><a href="//www.lib.ncsu.edu/services/makerspace">Makerspace</a></li>
			<li><a href="//www.lib.ncsu.edu/techlending">Technology Lending</a></li>
			<li><a href="//www.lib.ncsu.edu/computing">Computing &amp; Networks</a></li>
			<li><a href="//www.lib.ncsu.edu/printing">Print, Copy, Scan</a></li>
		</ul>
		<ul>
			<li><a href="//www.lib.ncsu.edu/borrow">Borrow, Renew, Request</a></li>
			<li><a href="//www.lib.ncsu.edu/tripsaver">Tripsaver</a></li>
			<li><a href="//www.lib.ncsu.edu/collections/suggestpurchase">Suggest a Purchase</a></li>
		</ul>
	</div>
	<div id="menu-libraries" class="primary-menu-list">
		<ul>
			<li><a href="//www.lib.ncsu.edu/hours/hill/general">D. H. Hill Library</a></li>
			<li><a href="//www.lib.ncsu.edu/huntlibrary">James B. Hunt Jr. Library</a></li>
			<li><a href="//www.lib.ncsu.edu/design">Design Library</a></li>
			<li><a href="//www.lib.ncsu.edu/nrl">Natural Resources Library</a></li>
			<li><a href="//www.lib.ncsu.edu/vetmed">Veterinary Medicine Library</a></li>
		</ul>
	</div>
	<div id="menu-about" class="primary-menu-list">
		<ul>
			<li><a href="//www.lib.ncsu.edu/staff">Staff</a></li>
			<li><a href="//www.lib.ncsu.edu/directories">Directories</a></li>
			<li><a href="//www.lib.ncsu.edu/giving/friends">Friends of the Library</a></li>
			<li><a href="//www.lib.ncsu.edu/specialcollections">Special Collections</a></li>
		</ul>
		<ul>
			<li><a href="//www.lib.ncsu.edu/contact">Contact Us</a></li>
			<li><a href="//www.lib.ncsu.edu/parking">Directions &amp; Parking</a></li>
			<li><a href="//www.lib.ncsu.edu/hours">Hours</a></li>
			<li><a href="//www.lib.ncsu.edu/jobs">Jobs</a></li>
			<li><a href="//www.lib.ncsu.edu/giving">Giving</a></li>
		</ul>
	</div>
</nav>

<section id="utility">
	<div id="utility-bar">
		<?php if(drupal_is_front_page() && $_SERVER['REMOTE_ADDR']): ?>
		<div id="home-hours">
			<p id="hours-title"><a href="/hours">TODAY'S HOURS</a>:</p>
			<ul>
				<?php
					// for current library hours
					include 'partials/util-hours.php';
				?>
				<li><a href="//www.lib.ncsu.edu/hours/hill/general"><span class="library">D. H. Hill:</span> &nbsp; <span class="hours"><?= $ary['hill']; ?></span></a></li>
				<li><a href="//www.lib.ncsu.edu/hours/hunt/general"><span class="library">James B. Hunt Jr.:</span> &nbsp; <span class="hours"><?= $ary['hunt']; ?></span></a></li>
			</ul>
		</div>
		<?php else: ?>
		<div id="utility-search" role="search">
			<form id="search-form" accept-charset="utf-8" method="get" action="//search.lib.ncsu.edu">
				<input type="search" id="search-all" name="q" class="main-search-field search-header quicksearch-typeahead" placeholder="Search books, articles, journals, website" title="Search books, articles, journals, &amp; library website">
				<button class="search-submit button show-for-small" type="submit">Search</button>
				<button class="search-submit button hide-for-small" type="submit"><i class="fa fa-search"></i><span class="text-for-fa">Search</span></button>
			</form>
		</div>
		<?php endif; ?>
		<nav role="navigation" aria-label="utility navigation">
			<?php include 'utility-links.php'; ?>
		</nav>
	</div>
</section>

<a name="#main-content" class="element-invisible element-focusable" tabindex="-1">Skip Content</a>

<?php include("/var/www/site/htdocs/notice/notice.php"); ?>