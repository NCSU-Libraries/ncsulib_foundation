<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

  <title><?php print $head_title; ?></title>
  <script src="/sites/all/themes/ncsulib_foundation/scripts/vendor/jquery-1.10.2.min.js"></script>
  <script src="/sites/all/themes/ncsulib_foundation/scripts/vendor/custom.modernizr.js"></script>
  <?php include 'includes/head.php'; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div class="off-canvas-wrap">
    <div class="inner-wrap">
      <!--.page -->
      <div role="document" class="page" id="content">
        <?php include variable_get('htdocs_root')."/notice/notice.php"; ?>
        <main role="main" class="row l-main">
          <div class="<?php print $main_grid; ?> main columns" id="main-content">
            <!-- top row -->
            <section id="tier-one">
              <h1>Site currently under maintenance</h1>
              <p>The following tools are still available:</p>
              <div id="search-options">
                <div id="home-search">
                  <div class="hide-for-medium-up">
                    <?php
                    include DRUPAL_ROOT.'/'.$GLOBALS['theme_path'].'/templates/includes/partials/home-search-mobile.html';
                    ?>
                  </div>

                  <div class="hide-for-small-only">
                    <?php
                    include DRUPAL_ROOT.'/'.$GLOBALS['theme_path'].'/templates/includes/partials/home-search_tabs-desktop.html';
                    ?>
                  </div>
                </div>
                <div id="research-tools">
                  <h2>More Research Tools</h2>
                  <ul>
                    <li><a href="/databases/" id="rt_databases">Databases</a></li>
                    <li><a href="/journals/" id="rt_journals">Journal Titles</a></li>
                    <li><a href="/citationbuilder" id="rt_citation_builder">Citation Builder</a></li>
                  </ul>
                </div>

                <h3>Other tools and resources</h3>
                <ul>
                  <li><a href="/studyrooms/getaroom.php">Reserve a Room</a></li>
                  <li><a href="/groupfinder/">GroupFinder</a></li>
                  <li><a href="/course">Course Tools</a></li>
                  <li><a href="http://reserves.lib.ncsu.edu/">Course Reserves</a></li>
                </ul>
              </section> <!-- /top row -->
            </div> <!--/.main region -->
          </main> <!--/.main-->
        </div> <!--/.page -->
      </div>
    </div>
  </body>
  </html>
