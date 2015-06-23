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

        <div class="columns medium-12">
            <?php echo ncsulib_foundation_breadcrumb(); ?>
        </div>

        <div class="<?= $main_grid; ?> main columns" id="main-content">

            <?php if ($title && !isset($node)): ?>
                <?php print render($title_prefix); ?>
                <h1 id="page-title" class="title"><?php print $title; ?></h1>
                <?php print render($title_suffix); ?>
            <?php endif; ?>

            <?php if (!empty($tabs)): ?>
                <?php print render($tabs); ?>
                <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
                <?php endif; ?>

                <?php if ($action_links): ?>
                <ul class="action-links">
                    <?php print render($action_links); ?>
                </ul>
            <?php endif; ?>

            <?php print render($page['content']); ?>
        </div>
        <!--/.l-main region -->

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
  <!--/.main-->

   <div class="row above-footer">
       <div class="medium-12 columns">
            <?php print render($page['above_footer']); ?>
       </div>
   </div>
   <!-- /.above-footer -->


</div>
<!--/.page -->
