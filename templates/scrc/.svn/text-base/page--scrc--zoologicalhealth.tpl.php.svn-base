<?php include DRUPAL_ROOT."/".$GLOBALS['theme_path']."/includes/header.php"; ?>
<div id="page" class="container-16">
	<div class="content-border">
		<div class="grid-16 clearfix">
			<?php if ($tabs): ?>
				<div class="tabs">
					<?php print render($tabs); ?>
				</div>
			<?php endif; ?>
			<?php //print $breadcrumb; ?>
			<?php print render($title_prefix); ?>
			<?php if ($title): ?>
				<h1 class="title" id="page-title"><?php print $title; ?></h1>
			<?php endif; ?>
			<?php print render($title_suffix); ?>
		</div>
		<?php if ($page['header']): ?>
			<div id="header" class="grid-16">
				<?php print render($page['header']); ?>
			</div>
		<?php endif; ?>
		<div id="main" class="column grid-16>">
			<div id="main-content" class="main-content region">
				<div class="column grid-10">
				<?php print views_embed_view('zoo_health_topleft'); ?>
				</div>
				<div class="column grid-6">
				<?php print render($page['content']); ?>
				</div>
				<div class="column grid-9">
				<?php print render($page['sidebar_first']); ?>
				</div>
				<div class="column grid-7">
				<?php print views_embed_view('zoo_health_bottomright'); ?>
				</div>
			</div>
		</div>

		<?php if ($page['footer']): ?>
			<div id="footer" class="grid-16">
				<?php print render($page['footer']); ?>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php include DRUPAL_ROOT."/".$GLOBALS['theme_path']."/includes/footer.html"; ?>
