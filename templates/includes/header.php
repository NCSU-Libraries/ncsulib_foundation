<header class="contain-to-grid">
	<nav class="top-bar">
		<ul class="title-area">
			<li class="name">
				<?php if ($logo): ?>
			  	<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
					<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			  	</a>
				<?php endif; ?>
			</li>
			<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
		</ul>

		<section class="top-bar-section">
			<ul id="my-menu" class="right">
				<li>
					<a href="#">Find</a>
					<ul>
						<li><a href="#">Books &amp; Media</a></li>
						<li><a href="#">Articles</a></li>
						<li><a href="#">Journal Titles</a></li>
						<li><a href="#">Databases</a></li>
						<li><a href="#">Course Reserves</a></li>
						<li><a href="#">Spatial &amp; Numerical Data</a></li>
						<li><a href="#">Special Collections</a></li>
						<li><a href="#">NC State Publications</a></li>
						<li><a href="#">Theses &amp; Dissertations</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Get Help</a>
					<ul>
						<li><a href="#">Ask Us</a></li>
						<li><a href="#">Research Consultation</a></li>
						<li><a href="#">Technology Consultation</a></li>
						<li><a href="#">Research Workshops</a></li>
						<li><a href="#">Copyright Guidance</a></li>
						<li><a href="#">Course Tools</a></li>
						<li><a href="#">Citation</a></li>
						<li><a href="#">Reference</a></li>
						<li><a href="#">Guides</a></li>
						<li><a href="#">Tutorials</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Services</a>
					<ul>
						<li><a href="#">Borrow, Renew, Request</a></li>
						<li><a href="#">Computing</a></li>
						<li><a href="#">Create Digital Media</a></li>
						<li><a href="#">Disability Services</a></li>
						<li><a href="#">Distance Learning</a></li>
						<li><a href="#">Faculty/Instructor Support</a></li>
						<li><a href="#">GroupFinder</a></li>
						<li><a href="#">Reserve a Room</a></li>
						<li><a href="#">Print, Copy, Scan</a></li>
						<li><a href="#">Suggest a Purchase</a></li>
						<li><a href="#">Technology Lending</a></li>
						<li><a href="#">Tripsaver</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Libraries</a>
					<ul>
						<li><a href="#">D. H. Hill Library</a></li>
						<li><a href="#">James B. Hunt Jr. Library</a></li>
						<li><a href="#">Design Library</a></li>
						<li><a href="#">Natural Resources Library</a></li>
						<li><a href="#">Veterinary Medicine Library</a></li>
					</ul>
				</li>
				<li>
					<a href="#">About</a>
					<ul>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Directions &amp; Parking</a></li>
						<li><a href="#">Hours</a></li>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Staff</a></li>
						<li><a href="#">Directories</a></li>
						<li><a href="#">Friends of the Library</a></li>
						<li><a href="#">Special Collections</a></li>
					</ul>
				</li>
			</ul>
		</section>
	</nav>
</header>











<?php return; ?>

  <!--.l-header region -->
  <header role="banner" class="l-header">

	<?php if ($top_bar): ?>
	  	<!--.top-bar -->
	  	<?php if ($top_bar_classes): ?>
	  	<div class="<?php print $top_bar_classes; ?>">
	  	<?php endif; ?>
			<nav class="top-bar"<?php print $top_bar_options; ?>>
			  	<?php if ($logo): ?>
			  	<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
					<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			  	</a>
				<?php endif; ?>
			  	<ul class="title-area">
					<li class="name"><h1><?php print $linked_site_name; ?></h1></li>
					<li class="toggle-topbar menu-icon"><a href="#"><span><?php print $top_bar_menu_text; ?></span></a></li>
			  	</ul>
			  	<section class="top-bar-section">
				<?php if ($top_bar_main_menu) :?>
				  	<?php print $top_bar_main_menu; ?>
				<?php endif; ?>
				<?php if ($top_bar_secondary_menu) :?>
				 	<?php print $top_bar_secondary_menu; ?>
				<?php endif; ?>
			  	</section>
			</nav>
	  	<?php if ($top_bar_classes): ?>
	  	</div>
	  	<?php endif; ?>
	  	<!--/.top-bar -->
	<?php endif; ?>















	<?php if (!empty($page['header'])): ?>
	  <!--.l-header-region -->
	  <section class="l-header-region row">
		<div class="large-12 columns">
		  <?php print render($page['header']); ?>
		</div>
	  </section>
	  <!--/.l-header-region -->
	<?php endif; ?>

  </header>
  <!--/.l-header -->
