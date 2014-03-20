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

<!--.page -->
<div id="content" role="document" class="page">

    <?php if (!empty($page['featured'])): ?>
        <!--/.featured -->
        <section class="l-featured row">
            <div class="large-12 columns">
                <?php print render($page['featured']); ?>
            </div>
        </section>
        <!--/.l-featured -->
    <?php endif; ?>

    <?php if ($messages): ?>
        <!--/.l-messages -->
        <section class="l-messages row">
            <div class="large-12 columns">
                <?php if ($messages): print $messages; endif; ?>
            </div>
        </section>
        <!--/.l-messages -->
    <?php endif; ?>

		<main role="main" class="row l-main">
	        <div class="<?= $main_grid; ?> main columns">

	            <a id="main-content"></a>

				<?php
					// Load all of the Hunt related gallery Node IDs and render to main area
					$nodes = node_load_multiple($nids = array(1653,1654,1656,1657,1658));
					$views = node_view_multiple($nodes, 'full');
					foreach ($views as $view) {
					  print drupal_render($view);
					}
				?>
			</div>

			<?php if (!empty($page['sidebar_first'])): ?>
	            <aside id="subnav" role="complementary" class="medium-3 <?= $sidebar_left; ?> l-sidebar-first columns sidebar">
	                <?php print render($page['sidebar_first']); ?>
	            </aside>
	        <?php endif; ?>

	        <?php if (!empty($page['sidebar_second'])): ?>
	            <aside role="complementary" class="medium-3 l-sidebar-second columns sidebar">
	                <?php print render($page['sidebar_second']); ?>
	            </aside>
	        <?php endif; ?>
		</main>
	</div>
</div>
<?php include DRUPAL_ROOT."/".$GLOBALS['theme_path']."/includes/footer.html"; ?>
