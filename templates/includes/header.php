<header class="contain-to-grid">
	<nav class="top-bar">
		<ul class="title-area">
			<li class="name">
			  	<a href="<?php print $GLOBALS['base_url']; ?>" title="<?php print t('NCSU Library'); ?>" rel="home" id="logo">
					<img src="<?php print $GLOBALS['base_url'].'/'.path_to_theme().'/images/ncsu-library-logo-white.png'; ?>" alt="<?php print t('Home'); ?>" />
			  	</a>
			</li>
			<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
		</ul>

		<section class="top-bar-section">
			<ul id="primary-nav" class="right">
				<li><a href="/find" data-menu="find" class="primary-menu-item">Find</a></li>
				<li><a href="/gethelp" data-menu="help" class="primary-menu-item">Get Help</a></li>
				<li><a href="/services" data-menu="services" class="primary-menu-item">Services</a></li>
				<li><a href="/hours/hill/general" data-menu="libraries" class="primary-menu-item">Libraries</a></li>
				<li><a href="/about" data-menu="about" class="primary-menu-item">About</a></li>
			</ul>
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
			<p id="hours-title">HOURS:</p>
			<ul>
				<li><a href="/hours/general/hill">D. H. Hill Library: &nbsp; Open 24 Hours</a></li>
				<li><a href="/hours/general/hunt">James B. Hunt Library: &nbsp; 7am-11pm</a></li>
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
		<nav id="utility-links">
			<ul>
				<li><a href="/askus">ASK US</a></li>
				<li><a href="http://myaccount.lib.ncsu.edu">MY ACCOUNT</a></li>
				<li><a href="/hours/">HOURS</a></li>
				<li><a href="/faq/">FAQ</a></li>
				<li><a href="https://www.lib.ncsu.edu/website/logout.php">LOG OUT</a></li>
				<li><a href="http://libraryh3lp.com/chat/ref-desk@chat.libraryh3lp.com">CHAT NOW</a></li>
			</ul>
		</nav>
	</div>
</section>
