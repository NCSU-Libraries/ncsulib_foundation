<?php
    drupal_add_css(drupal_get_path('theme', 'ncsulib_foundation').'/styles/core/custom/home.css', array('weight' => 998, 'group' => 101));
    drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/home-artbox.js');
    drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/search-tabs.js');
    //drupal_add_js('/catalog/scripts/app.js');
    drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/availability-data.js');
    drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/home-tracking-events.js');
    drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/vendor/trln_autosuggest.js');
    drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/vendor/trln_autocomplete.js');
    drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/books-media-tab-autosuggest.js');
    drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/home-search-tabs-logging.js');
    // drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/ab-test.js');
    drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/vendor/foundation/foundation.interchange.js', array('scope'=>'footer'));
?>


<!--.page -->
<div role="document" class="page" id="content">
    <?php '';//include variable_get('htdocs_root')."/notice/notice.php"; ?>
    <?php if (!empty($page['featured'])): ?>
        <!--/.featured -->
        <section class="l-featured">
            <div class="medium-12 columns">
                <?php print render($page['featured']); ?>
            </div>
        </section>
        <!--/.l-featured -->
    <?php endif; ?>
    <main role="main" class="row l-main">
        <div class="<?php print $main_grid; ?> main columns" id="main-content">
            <!-- top row -->
            <section id="tier-one">
                <div id="search-options">
                    <div id="home-search">
                        <?php
                            include DRUPAL_ROOT.'/'.$GLOBALS['theme_path'].'/templates/includes/partials/home-search-mobile.html';
                            include DRUPAL_ROOT.'/'.$GLOBALS['theme_path'].'/templates/includes/partials/home-search_tabs-desktop.html';
                        ?>
                    </div>
                    <div id="research-tools">
                        <h2>More Research Tools:</h2>
                        <ul>
                            <li><a href="/databases/" id="rt_databases">Databases</a></li>
                            <li><a href="/journals/" id="rt_journals">Journal Titles</a></li>
                            <li><a href="/citationbuilder" id="rt_citation_builder">Citation Builder</a></li>
                        </ul>
                    </div>

                    <div id="home-quicklinks">
                        <ul id="quicklinks">
                            <li>
                                <ul>
                                    <li><h2>Technology</h2></li>
                                    <li><a href="/services/digital-media-production/" id="ql_cdm" class="styled">Digital Media Production</a></li>
                                    <li><a href="/services/makerspace/" class="styled" id="ql_makersace">Makerspace</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><h2>Studying</h2></li>
                                    <li><a href="/reservearoom/" class="styled" id="ql_reservearoom">Reserve a Room</a></li>
                                    <li><a href="/groupfinder/" class="styled" id="ql_group_finder">GroupFinder</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><h2>Courses</h2></li>
                                    <li><a href="/course" class="styled" id="ql_searchtools">Course Tools</a></li>
                                    <li><a href="//reserves.lib.ncsu.edu/auth/" class="styled" id="ql_course_reserves">Course Reserves</a></li>
                                    <li><a href="/textbookservice/" class="styled" id="ql_textbooks">Textbooks</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- artbox stub-->
                <div id="home-artbox">
                    <?php include_once 'block--nivo_slider.tpl.php'; ?>
                </div>

            </section> <!-- /top row -->

            <!-- middle row -->
            <section id="tier-two">
                <div id="available-links">
                    <h2>Available Now</h2>
                    <ul>
                        <li><a href="/reservearoom/" id="al_reservearoom">Reserve a Room</a></li>
                        <li><a href="/techlending/" id="al_techlending">Borrow Technology</a></li>
                    </ul>
                </div>

                <!-- availability tabs stub -->
                <div id="availability">
                    <dl class="tabs vertical" data-tab>
                        <dd class="active"><a href="#panel-hill">D. H. Hill Library</a></dd>
                        <dd><a href="#panel-hunt">James B. Hunt Jr. Library</a></dd>
                    </dl>
                    <div class="tabs-content vertical">
                        <div class="content active" id="panel-hill">
                            <ul>
                                <li>
                                    <span class="item"><a href="/reservearoom" id="al_hill_study_rooms">Study Rooms</a> </span>
                                    <span class="item-count count" id="hill-study"></span>
                                </li>
                                <li>
                                    <span class="item"><a href="/techlending/laptops-netbooks" id="al_hill_laptops">Laptops</a> </span>
                                    <span class="item-count count" id="hill-laptops"></span>
                                </li>
                                <li>
                                    <span class="item"><a href="/techlending/tablets-and-ipods" id="al_hill_tablets">Tablets</a> </span>
                                    <span class="item-count count" id="hill-tablets"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="content" id="panel-hunt">
                            <ul>
                                <li>
                                    <span class="item"><a href="/reservearoom" id="al_hunt_study_rooms">Study Rooms</a> </span>
                                    <span class="item-count count" id="hunt-study"></span>
                                </li>
                                <li>
                                    <span class="item"><a href="/techlending/laptops-netbooks" id="al_hunt_laptops">Laptops</a> </span>
                                    <span class="item-count count" id="hunt-laptops"></span>
                                </li>
                                <li>
                                    <span class="item"><a href="/techlending/tablets-and-ipods" id="al_hunt_tablets">Tablets</a> </span>
                                    <span class="item-count count" id="hunt-tablets"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </section>

            <!-- bottom row -->
            <section id="tier-three">

                <div id="story-1">
                    <div class="story-photo">
                        <a href="/huntlibrary/" id="story-1-photo">
                            <img src="/sites/all/themes/ncsulib_foundation/images/homepage/hunt.jpg" title="&copy; Jeff Goldberg/ESTO" alt="The James B. Hunt Jr. Library" width="100%">
                        </a>
                    </div>
                    <h3>
                        <a href="/huntlibrary/" id="story-1-heading">James B. Hunt Jr. Library</a>
                    </h3>

                    <ul class="hunt-list">
                        <li><a href="/huntlibrary/#storify" class="story-1-link">Hunt Library on Storify</a></li>
                        <li><a href="/huntlibrary/inthenews" class="story-1-link">In the News</a></li>
                        <li><a href="/huntlibrary/bookBot" class="story-1-link">bookBot</a></li>
                        <li><a href="/huntlibrary/namingopportunities" class="story-1-link">Help support Hunt</a></li>
                        <li><a href="//www.ncsu.edu/huntlibrary/" class="story-1-link">Think and Do</a></li>
                    </ul>
                </div>

                <div id="story-2" class="library-stories">
                    <h3><a href="/stories" id="story-2-heading">Featured Library Story</a></h3>
                    <div class="story-photo">
                        <a href="/stories/shooting-wars" id="story-2-photo">
                            <img src="/sites/all/themes/ncsulib_foundation/images/homepage/shooting-wars.jpg" alt="NC State University Library Stories" width="100%" />
                        </a>
                    </div>
                    <h2><a href="/stories/shooting-wars">Shooting Wars: New Spaces Give Old Media New Meaning</a></h2>
                    <!-- <p>"The library has the best creative collaboration and presentation spaces on campus."</p> -->
                    <p><a href="/stories/shooting-wars">Learn More <i class="fa fa-chevron-right"></i></a></p>
                </div>

                <div id="happenings">
                    <div id="home-news">
                        <div class="happenings-photo">
                            <a href="/news/" class="news-link"><img src="/sites/all/themes/ncsulib_foundation/images/homepage/news.jpg" alt="" width="100%" /></a>
                        </div>
                        <div class="happenings-content">
                            <h2><a href="/news/" class="news-link">News</a></h2>
                            <p>Technology, innovative spaces, new library resources, and more…</p>
                        </div>
                    </div>
                    <div id="home-events">
                        <div class="happenings-photo">
                            <a href="/events/" class="events-link"><img src="/sites/all/themes/ncsulib_foundation/images/homepage/events.jpg" alt="" width="100%" /></a>
                        </div>
                        <div class="happenings-content">
                            <h2><a href="/events/" class="events-link">Events</a></h2>
                            <p>Speaker series, book discussions, campus and community events...</p>
                        </div>
                    </div>
                    <div id="home-exhibits">
                        <div class="happenings-photo">
                            <a href="/exhibits/" class="exhibits-link"><img src="/sites/all/themes/ncsulib_foundation/images/homepage/exhibits.jpg" alt="" width="100%" /></a>
                        </div>
                        <div class="happenings-content">
                            <h2><a href="/exhibits/" class="exhibits-link">Exhibits</a></h2>
                            <p>Featured collections, visiting exhibits, digital immersion experiences…</p>
                        </div>
                    </div>
                </div>

            </section> <!-- /bottom row -->

        </div> <!--/.main region -->
    </main> <!--/.main-->
</div> <!--/.page -->

<section id="library-stories">
    <div id="library-stories-wrapper">
        <div class="row above-footer">
            <div class="medium-12 columns">
                <?php print render($page['above_footer']); ?>
            </div>
        </div>
    </div>
</section>
<!-- /.above-footer -->
