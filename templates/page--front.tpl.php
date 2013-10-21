<!--.page -->
<div role="document" class="page">
    <main role="main" class="row l-main">
        <div class="<?php print $main_grid; ?> main columns">
            <a id="main-content"></a>

            <!-- top row -->
            <section id="tier-one">

                <?php include 'includes/home-search-tabs.php'; ?>

                <!-- artbox stub -->
                <div id="home-artbox">
                    <ul data-orbit>
                        <li>
                            <img src="http://lib.ncsu.edu/artbox/images/1013-06.jpg" />
                        </li>
                        <li>
                            <img src="http://lib.ncsu.edu/artbox/images/1013-05.jpg" />
                        </li>
                        <li>
                            <img src="http://lib.ncsu.edu/artbox/images/1013-04.jpg" />
                        </li>
                    </ul>
                </div>

            </section> <!-- /top row -->

            <!-- middle row -->
            <section id="tier-two">
                <h4>Availability <a href="/reservearoom/">Reserve a Room</a><a href="/techlending/">Borrow Technology</a></h4>
                <div id="availibility">
                    <!-- availability tabs stub -->
                    <div class="section-container auto search-tabs vertical-tabs" data-section="vertical-tabs">
                        <section class="active">
                            <p class="title" data-section-title><a href="#panel1">D. H. Hill Library</a></p>
                            <div class="content" data-section-content>
                                <ul>
                                    <li>
                                        <span class="item"><a href="/studyrooms/getaroom.php">Study Rooms</a>:</span>
                                        <span class="item-count"><span class="count">18</span> of 73</span>
                                    </li>
                                    <li>
                                        <span class="item"><a href="/studyrooms/getaroom.php">Laptops</a>:</span>
                                        <span class="item-count"><span class="count">47</span> of 67</span>
                                    </li>
                                    <li>
                                        <span class="item"><a href="/studyrooms/getaroom.php">Tablets</a>:</span>
                                        <span class="item-count"><span class="count">76</span> of 82</span>
                                    </li>
                                </ul>
                            </div>
                        </section>
                        <section>
                            <p class="title" data-section-title><a href="#panel2">James B. Hunt Jr. Library</a></p>
                            <div class="content" data-section-content>
                                <ul>
                                    <li>
                                        <span class="item"><a href="/studyrooms/getaroom.php">Study Rooms</a>:</span>
                                        <span class="item-count"><span class="count">3</span> of 43</span>
                                    </li>
                                    <li>
                                        <span class="item"><a href="/studyrooms/getaroom.php">Laptops</a>:</span>
                                        <span class="item-count"><span class="count">654</span> of 764</span>
                                    </li>
                                    <li>
                                        <span class="item"><a href="/studyrooms/getaroom.php">Tablets</a>:</span>
                                        <span class="item-count"><span class="count">13</span> of 46</span>
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

            </section> <!-- /bottom row -->

        </div> <!--/.main region -->
    </main> <!--/.main-->
    <?php if ($messages && $zurb_foundation_messages_modal): print $messages; endif; ?>
</div> <!--/.page -->
