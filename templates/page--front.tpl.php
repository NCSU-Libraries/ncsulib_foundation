<?php
    drupal_add_css(drupal_get_path('theme', 'ncsulib_foundation').'/styles/core/custom/home.css', array('weight' => 999));
    drupal_add_js(drupal_get_path('theme', 'ncsulib_foundation').'/scripts/front-page.js');
?>

<!--.page -->
<div role="document" class="page" id="content">
    <main role="main" class="row l-main">
        <div class="<?php print $main_grid; ?> main columns">
            <a id="main-content"></a>

            <!-- top row -->
            <section id="tier-one">


                <div id="search-tabs">

                    <!-- Search tabs begin -->
                    <dl class="tabs" data-tab>
                      <dd class="active"><a href="#panel2-1">All</a></dd>
                      <dd><a href="#panel2-2">Articles</a></dd>
                      <dd><a href="#panel2-3">Books &amp; Media</a></dd>
                      <dd><a href="#panel2-4">Our Website</a></dd>
                    </dl>

                    <div class="tabs-content">
                        <!-- All -->
                        <div class="content active" id="panel2-1">
                            <form accept-charset="utf-8" method="get" action="/search/" id="searcheverything">
                                <input type="text" id="searchall" value="" name="q" class="main-search-field" placeholder="Search books, articles, journals, &amp; library website" />
                                <input type="submit" class="front-page-submit button small" id="all-submit" value="SEARCH" />
                            </form>
                        </div>

                        <!-- Articles -->
                        <div class="content" id="panel2-2">
                            <form accept-charset="utf-8" method="get" action="http://ncsu.summon.serialssolutions.com/search" id="search-articles-summon">
                                <div class="search-body">
                                    <input type="text" id="searcharticle" value="" name="s.q" class="articles-search-field" placeholder="Search for articles in Summon." />
                                    <input type="submit" id="article-submit" class="front-page-submit button small" value="SEARCH" />

                                    <p class="search-example">EX: tropical deforestation or enter a DOI</p>
                                    <select id="searcharticleadvanced" name="searcharticleadvanced" class="has_sb">
                                        <option value="anywhere">Anywhere</option>
                                        <option value="title">Title</option>
                                        <option value="author">Author</option>
                                    </select>

                                    <label class="access" for="peer-reviewed"><input type="checkbox" value="IsPeerReviewed,true" name="s.fvf[]" id="peer-reviewed" class="article-input" /> Peer-reviewed only</label>
                                    <p class="search-more"><a href="/articles/"  onclick="_gaq.push(['_trackEvent', 'Article Search', 'Internal Link', 'Articles']);">More search options »</a></p>
                                </div>
                                <!-- ncsu.summon.serialssolutions.com hidden inputs -->
                                <input type="hidden" value="ContentType,Book Chapter,f" name="s.fvf[]" />
                                <input type="hidden" class="article-input" value="ContentType,Journal Article" name="s.fvf[]" />
                                <input type="hidden" class="article-input" value="addFacetValueFilters(ContentType,Journal / eJournal)" name="s.cmd" />
                                <input type="hidden" value="true" name="keep_r" />
                            </form>
                        </div>

                        <!-- Books and Media -->
                        <div class="content" id="panel2-3">
                            <form accept-charset="utf-8" method="get" action="http://catalog.lib.ncsu.edu/" id="searchbooksform">
                                <div class="search-body clearfix">
                                    <input type="text" value="" id="books-media-search" name="Ntt" class="books-media-search-field ac_input" placeholder="Search for ebooks, journals, movies &amp; more" autocomplete="off">
                                    <input type="submit" class="front-page-submit button small prefix" value="SEARCH" id="searchbookssubmit">
                                    <p class="search-example">Example: Freakonomics</p>

                                    <select id="books-more-options-drop" name="Ntk" class="has_sb">
                                        <option selected="selected" value="Keyword">Anywhere</option>
                                        <option value="Title">Title</option>
                                        <option value="Journal_Title">Journal Title</option>
                                        <option value="Author">Author</option>
                                        <option value="Subject">Subject Heading</option>
                                        <option value="ISBN">ISBN/ISSN</option>
                                        <option value="LC" class="callnum">Call Number</option>
                                        <option value="SUDOC" class="callnum">Gov Doc Number</option>
                                    </select>

                                    <label class="access" for="ncsu"><input type="radio" checked="checked" value="ncsu" name="scope" id="ncsu" /> NC State Only</label></li>
                                    <label class="access" for="trln"><input type="radio" value="trln" name="scope" id="trln" /> Triangle Research Libraries</label></li>
                                    <label class="access" for="worldcat"><input type="radio" value="worldcat" name="scope" id="worldcat" /> UNC System Libraries &amp; Beyond</label></li>
                                    <p class="search-more"><a href="/catalog/" onclick="_gaq.push(['_trackEvent', 'Book Search', 'Internal Link', 'Catalog']);">More search options »</a></p>
                                </div>
                                <input type="hidden" value="1" name="Nty">
                                <input type="hidden" value="0" name="N">
                                <input type="hidden" value="" id="sugg" name="sugg">
                            </form>
                        </div>

                        <!-- Website -->
                        <div class="content" id="panel2-4">
                            <form accept-charset="utf-8" method="get" action="/search/websearch.php" id="websitesearch">
                                <input type="text" id="searchweb" value="" name="q" class="main-search-field" placeholder="Search the library website">
                                <input type="submit" class="front-page-submit button small prefix" id="web-submit" value="SEARCH" />
                                <p class="search-example">Example: Borrow a Laptop</p>
                            </form>
                        </div>
                    </div>
                    <!-- Search tabs end -->




                        <div id="research-options">
                            <h6>More Research Tools:</h6>
                            <ul>
                                <li><a href="/databases/" onClick="_gaq.push(['_trackEvent', 'Search', 'More Research Tools', 'Databases']);">Databases</a></li>
                                <li><a href="/journals/">Journal Titles</a></li>
                                <li><a href="/citationbuilder">Citation Builder</a></li>
                            </ul>
                        </div>
                        <ul id="home-quicklinks">
                            <li>
                                <ul>
                                    <li><h4>Technology</h4></li>
                                    <li><a href="/cdm/" onClick="_gaq.push(['_trackEvent', 'Quicklinks', 'Technology', 'Create Digital Media']);">Create Digital Media</a></li>
                                    <li><a href="/spaces/makerspace/" onClick="_gaq.push(['_trackEvent', 'Quicklinks', 'Technology', 'Makerspace']);">Makerspace</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><h4>Studying</h4></li>
                                    <li><a href="/reservearoom/" onClick="_gaq.push(['_trackEvent', 'Quicklinks', 'Studying', 'Reserve a Room']);">Reserve a Room</a></li>
                                    <li><a href="/groupfinder/" onClick="_gaq.push(['_trackEvent', 'Quicklinks', 'Studying', 'GroupFinder']);">GroupFinder</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><h4>Courses</h4></li>
                                    <li><a href="/course" onClick="_gaq.push(['_trackEvent', 'Quicklinks', 'Courses', 'Course Tools']);">Course Tools</a></li>
                                    <li><a href="http://reserves.lib.ncsu.edu/" onClick="_gaq.push(['_trackEvent', 'Quicklinks', 'Courses', 'Course Reserves']);">Course Reserves</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                <!-- artbox stub -->
                <div id="home-artbox">
                    <ul data-orbit>
                        <li>
                            <img src="http://lib.ncsu.edu/artbox/images/0114-04.jpg" width="100%" />
                        </li>
                        <li>
                            <img src="http://lib.ncsu.edu/artbox/images/0114-06.jpg" width="100%"/>
                        </li>
                        <li>
                            <img src="http://lib.ncsu.edu/artbox/images/0114-08.jpg" width="100%"/>
                        </li>
                    </ul>
                </div>
            </section> <!-- /top row -->

            <!-- middle row -->
            <section id="tier-two">
                <ul id="available-links" class="inline-list">
                    <li><h4>Available Now</h4></li>
                    <li><a href="/reservearoom/">Reserve a Room</a></li>
                    <li><a href="/techlending/">Borrow Technology</a></li>
                </ul>

                <div id="availability">
                    <!-- availability tabs stub -->
                    <div class="section-container auto search-tabs vertical-tabs" data-section="vertical-tabs">
                        <section class="active">
                            <p class="title" data-section-title><a href="#panel1">D. H. Hill Library</a></p>
                            <div class="content" data-section-content>
                                <ul>
                                    <li>
                                        <span class="item"><a href="/studyrooms/getaroom.php" onClick="_gaq.push(['_trackEvent', 'Availability', 'Hill', 'study rooms']);">Study Rooms</a>:</span>
                                        <span class="item-count count" id="hill-study"></span>
                                    </li>
                                    <li>
                                        <span class="item"><a href="/studyrooms/getaroom.php" onClick="_gaq.push(['_trackEvent', 'Availability', 'Hill', 'laptops']);">Laptops</a>:</span>
                                        <span class="item-count count" id="hill-laptops"></span>
                                    </li>
                                    <li>
                                        <span class="item"><a href="/studyrooms/getaroom.php" onClick="_gaq.push(['_trackEvent', 'Availability', 'Hill', 'tablets']);">Tablets</a>:</span>
                                        <span class="item-count count" id="hill-tablets"></span>
                                    </li>
                                </ul>
                            </div>
                        </section>
                        <section>
                            <p class="title" data-section-title><a href="#panel2">James B. Hunt Jr. Library</a></p>
                            <div class="content" data-section-content>
                                <ul>
                                    <li>
                                        <span class="item"><a href="/studyrooms/getaroom.php" onClick="_gaq.push(['_trackEvent', 'Availability', 'Hunt', 'Study Rooms']);">Study Rooms</a>:</span>
                                        <span class="item-count count" id="hunt-study"></span>
                                    </li>
                                    <li>
                                        <span class="item"><a href="/studyrooms/getaroom.php" onClick="_gaq.push(['_trackEvent', 'Availability', 'Hunt', 'laptops']);">Laptops</a>:</span>
                                        <span class="item-count count" id="hunt-laptops"></span>
                                    </li>
                                    <li>
                                        <span class="item"><a href="/studyrooms/getaroom.php" onClick="_gaq.push(['_trackEvent', 'Availability', 'Hunt', 'tablets']);">Tablets</a>:</span>
                                        <span class="item-count count" id="hunt-tablets"></span>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </section>

            <!-- bottom row -->
            <section id="tier-three">

                <div id="story-1">
                    <div class="story-photo">
                        <a href="/huntlibrary/" onClick="_gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'photo']);">
                            <img src="http://lib.ncsu.edu/sites/default/files/hunt-front.jpg"  alt="The James B. Hunt Jr. Library" width="100%">
                        </a>
                    </div>
                    <h2>
                        <a href="/huntlibrary/" onClick="_gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'h2']);">James B. Hunt Jr. Library</a>
                    </h2>

                    <ul class="hunt-list">
                        <li><a href="/huntlibrary/#storify" onClick="_gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'link']);">Hunt Library on Storify</a></li>
                        <li><a href="/huntlibrary/inthenews" onClick="_gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'link']);">In the News</a></li>
                        <li><a href="/huntlibrary/bookBot" onClick="_gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'link']);">bookBot</a></li>
                        <li><a href="/huntlibrary/namingopportunities" onClick="_gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'link']);">Help support Hunt</a></li>
                        <li><a href="http://www.ncsu.edu/huntlibrary/" onClick="_gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'link']);">Think and Do</a></li>
                    </ul>
                </div>

                <div id="story-2">
                    <div class="story-photo">
                        <a href="http://d.lib.ncsu.edu/myhuntlibrary" onClick="_gaq.push(['_trackEvent', 'Feature Area 2', 'My Hunt', 'photo']);">
                            <img src="http://lib.ncsu.edu/sites/default/files/myhunt-front.jpg" alt="Students posing on the monumental stairs" title="photo credit: @emily_reeves12" width="100%" />
                        </a>
                    </div>
                    <h2><a href="http://d.lib.ncsu.edu/myhuntlibrary" onClick="_gaq.push(['_trackEvent', 'Feature Area 2', 'My Hunt', 'h2']);">MY &#35;HuntLibrary</a></h2>
                    <p>We're archiving Instagram photographs tagged #HuntLibrary to help document the story of the James B. Hunt Jr. Library -- the best learning and collaborative space in the country.</p>
                    <p>See recent and popular photos, staff picks, and vote for your favorites. </p>
                </div>

                <div id="happenings">
                    <div id="home-news">
                        <div class="happenings-photo">
                            <a href="/news/" onClick="_gaq.push(['_trackEvent', 'Happenings', 'click', 'news']);"><img src="http://lib.ncsu.edu/sites/default/files/news-front.jpg" alt="News Image" width="100%" /></a>
                        </div>
                        <div class="happenings-content">
                            <h2><a href="/news/" onClick="_gaq.push(['_trackEvent', 'Happenings', 'click', 'news']);">News</a></h2>
                            <p>Technology, innovative spaces, new library resources, and more…</p>
                        </div>
                    </div>
                    <div id="home-events">
                        <div class="happenings-photo">
                            <a href="/events/" onClick="_gaq.push(['_trackEvent', 'Happenings', 'click', 'events']);"><img src="http://lib.ncsu.edu/sites/default/files/events-front.jpg" alt="Events Image" width="100%" /></a>
                        </div>
                        <div class="happenings-content">
                            <h2><a href="/events/" onClick="_gaq.push(['_trackEvent', 'Happenings', 'click', 'events']);">Events</a></h2>
                            <p>Speaker series’, book discussions, campus and community events...</p>
                        </div>
                    </div>
                    <div id="home-exhibits">
                        <div class="happenings-photo">
                            <a href="/exhibits/" onClick="_gaq.push(['_trackEvent', 'Happenings', 'click', 'exhibits']);"><img src="http://lib.ncsu.edu/sites/default/files/exhibits-front.jpg" alt="Exhibits Image" width="100%" /></a>
                        </div>
                        <div class="happenings-content">
                            <h2><a href="/exhibits/" onClick="_gaq.push(['_trackEvent', 'Happenings', 'click', 'exhibits']);">Exhibits</a></h2>
                            <p>Featured collections, visiting exhibits, digital immersion experiences…</p>
                        </div>
                    </div>
                </div>

            </section> <!-- /bottom row -->

        </div> <!--/.main region -->
    </main> <!--/.main-->
    <?php if ($messages && $zurb_foundation_messages_modal): print $messages; endif; ?>
</div> <!--/.page -->
