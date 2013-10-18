<!--.page -->
<div role="document" class="page">
    <main role="main" class="row l-main">
        <div class="<?php print $main_grid; ?> main columns">
            <a id="main-content"></a>

            <!-- top row -->
            <div id="tier-one">

                <?php include 'includes/home-search-tabs.php'; ?>

                <!-- artbox stub -->
                <div id="home-artbox">
                    <ul data-orbit>
                        <li>
                            <img src="http://lib.ncsu.edu/artbox/images/1013-06.jpg" />
                            <!-- <div class="orbit-caption">...</div> -->
                        </li>
                        <li>
                            <img src="http://lib.ncsu.edu/artbox/images/1013-05.jpg" />
                            <!-- <div class="orbit-caption">...</div> -->
                        </li>
                        <li>
                            <img src="http://lib.ncsu.edu/artbox/images/1013-04.jpg" />
                            <!-- <div class="orbit-caption">...</div> -->
                        </li>
                    </ul>
                </div>

            </div> <!-- /top row -->

            <!-- middle row -->
            <div id="tier-two">
                <div id="availibility">
                    <!-- availability tabs stub -->
                    <div class="section-container auto search-tabs" data-section>
                        <section class="active">
                            <p class="title" data-section-title><a href="#panel1">Section 1</a></p>
                            <div class="content" data-section-content>
                                <p>Content of section 1.</p>
                            </div>
                        </section>
                        <section>
                            <p class="title" data-section-title><a href="#panel2">Section 2</a></p>
                            <div class="content" data-section-content>
                                <p>Content of section 2.</p>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <!-- bottom row -->
            <div id="tier-three">

                <div id="story-1">
                    <div class="story-photo">
                        <a href="/huntlibrary/">
                            <img src="http://lib.ncsu.edu/sites/default/files/hunt-front.jpg"  alt="The James B. Hunt Jr. Library" width="100%">
                        </a>
                    </div>
                    <h2>
                        <a href="/huntlibrary/">James B. Hunt Jr. Library</a>
                    </h2>

                    <ul class="hunt-list">
                        <li><a href="/huntlibrary/#storify">Hunt Library on Storify</a></li>
                        <li><a href="/huntlibrary/inthenews">In the News</a></li>
                        <li><a href="/huntlibrary/bookBot">bookBot</a></li>
                        <li><a href="/huntlibrary/namingopportunities">Help support Hunt</a></li>
                        <li><a href="http://www.ncsu.edu/huntlibrary/">Think and Do</a></li>
                    </ul>
                </div>

                <div id="story-2">
                    <div class="story-photo">
                        <a href="http://d.lib.ncsu.edu/myhuntlibrary">
                            <img src="http://lib.ncsu.edu/sites/default/files/myhunt-front.jpg" alt="Students posing on the monumental stairs" title="photo credit: @emily_reeves12" width="100%" />
                        </a>
                    </div>
                    <h2><a href="http://d.lib.ncsu.edu/myhuntlibrary">MY &#35;HuntLibrary</a></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adcing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>

                <div id="happenings">
                    <div id="home-news">
                        <div class="happenings-photo">
                            <a href="/news/"><img src="http://lib.ncsu.edu/sites/default/files/news-front.jpg" alt="girl typing at lap" width="100%" /></a>
                        </div>
                        <div class="happenings-content">
                            <h2><a href="/news/">News</a></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div id="home-events">
                        <div class="happenings-photo">
                            <a href="/events/"><img src="http://lib.ncsu.edu/sites/default/files/events-front.jpg" alt="girl typing at lap" width="100%" /></a>
                        </div>
                        <div class="happenings-content">
                            <h2><a href="/news/">Events</a></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div id="home-exhibits">
                        <div class="happenings-photo">
                            <a href="/exhibits/"><img src="http://lib.ncsu.edu/sites/default/files/exhibits-front.jpg" alt="girl typing at lap" width="100%" /></a>
                        </div>
                        <div class="happenings-content">
                            <h2><a href="/news/">Exhibits</a></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>

            </div> <!-- /bottom row -->

        </div> <!--/.main region -->
    </main> <!--/.main-->
    <?php if ($messages && $zurb_foundation_messages_modal): print $messages; endif; ?>
</div> <!--/.page -->
