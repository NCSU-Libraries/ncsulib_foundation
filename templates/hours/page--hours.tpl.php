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
		<div id="main" class="column push-6 grid-10">
			<div id="main-content" class="main-content region">
				<?php print render($page['content']); ?>
			</div>
		</div>
		<?php if ($page['sidebar_first']): ?>
			<div id="sidebar-left" class="column sidebar region grid-6 <?php print ns('pull-10', $page['sidebar_second'], 4); ?>">
				<?php print render($page['sidebar_first']); ?>
			</div>
		<?php endif; ?>
		<?php if ($page['sidebar_second']): ?>
			<div id="sidebar-right" class="column sidebar region grid-4">
				<?php print render($page['sidebar_second']); ?>
			</div>
		<?php endif; ?>
		<?php if ($page['footer']): ?>
			<div id="footer" class="grid-16">
				<?php print render($page['footer']); ?>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php include DRUPAL_ROOT."/".$GLOBALS['theme_path']."/includes/footer.html"; ?>
