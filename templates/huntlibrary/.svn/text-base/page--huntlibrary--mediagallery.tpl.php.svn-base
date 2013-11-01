<?php
/**
 * THIS IS NOT LIVE
 * (future) Photos and Video Gallery
 * Path: /huntlibrary/mediagallery
 * Author: Charlie Morris
 * Date: -- ongoing --
 *
 * TODO: Continue Drupalization, troubleshoot caching problem
 *
 */
?>

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
		<div id="main" class="column <?php print ns('grid-16', $page['sidebar_first'], 4, $page['sidebar_second'], 4) . ' ' . ns('push-4', !$page['sidebar_first'], 4); ?>">
			<div id="main-content" class="main-content region">

				<?php
				// Load all of the Hunt related gallery Node IDs and render to main area
				$nodes = node_load_multiple($nids = array(1653,1654,1656,1657,1658));
				$views = node_view_multiple($nodes, 'full');
				foreach ($views as $view) {
				  print drupal_render($view);
				}
				// foreach ($nodes as $galleries) {
				// 	$foo['#cache']  = array(
				// 			'keys' => 'media_gallery_hunt_library',
				// 			'expire' => '1392001200'
				// 	);
				// }
				// $i = 0;
				// $cid = "hunt_media_gallery_cache";
				// foreach ($nodes as $gallery) {

				// 	$renderable = node_view($gallery);
				// 	// echo "<h1>"+ $renderable=>nid +"</h1>";
				// 	$cid .= $i;
				// 	$renderable['#cache']['cid'] = $cid;
				// 	$renderable['#cache']['bin'] = 'cache_page';
				// 	$renderable['#cache']['expire'] = '1392001200';
				// 	print drupal_render($renderable);
				// 	// if ($i==0){var_dump($renderable);};
				// 	$i++;
				// }
				?>
			</div>
		</div>
		<?php if ($page['sidebar_first']): ?>
			<div id="sidebar-left" class="column sidebar region grid-4 <?php print ns('pull-12', $page['sidebar_second'], 4); ?>">
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
