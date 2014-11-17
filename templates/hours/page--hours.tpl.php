<div id="content" role="document" class="page">
	<div id="page" class="row" role="main">
		<div class="content-border">
			<div class="columns large-12">
				<?php if ($tabs): ?>
					<div class="tabs">
						<?php print render($tabs); ?>
					</div>
				<?php endif; ?>
				<?php //print $breadcrumb; ?>
				<?php print render($title_prefix); ?>
				<!--?php if ($title): ?-->
					<h1 class="title" id="page-title">Libraries &amp; Hours</h1>
				<!--?php endif; ?-->
				<?php print render($title_suffix); ?>
			</div>

			<?php if ($page['sidebar_first']): ?>
				<div id="sidebar-left">
					<?php print render($page['sidebar_first']); ?>
				</div>
			<?php endif; ?>

			<div id="main">
				<div id="main-content" class="main-content">
					<?php print render($page['content']); ?>
				</div>
			</div>

		</div>
	</div>
</div>
