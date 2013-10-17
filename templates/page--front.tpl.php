<!--.page -->
<div role="document" class="page">
    <main role="main" class="row l-main">
        <div class="<?php print $main_grid; ?> main columns">
            <a id="main-content"></a>

            <!-- top row -->
            <div class="row">

                <?php include 'includes/home-search-tabs.php'; ?>

                <!-- artbox stub -->
                <div class="large-5 columns">
                    <ul data-orbit>
                        <li>
                            <img src="/artbox/images/1013-06.jpg" />
                            <!-- <div class="orbit-caption">...</div> -->
                        </li>
                        <li>
                            <img src="/artbox/images/1013-05.jpg" />
                            <!-- <div class="orbit-caption">...</div> -->
                        </li>
                        <li>
                            <img src="/artbox/images/1013-04.jpg" />
                            <!-- <div class="orbit-caption">...</div> -->
                        </li>
                    </ul>
                </div>

            </div> <!-- /top row -->

            <!-- middle row -->
            <div class="row">
                <div class="large-12 columns">
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
            </div> <!-- /middle row -->

            <!-- bottom row -->
            <div class="row">

                <div class="large-4 columns">

                    <div class="row">
                        <div class="large-12 columns">
                            <a href="/huntlibrary/">
                                <img src="/sites/default/files/hunt-front.jpg"  alt="The James B. Hunt Jr. Library" width="100%">
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
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
                    </div>

                </div>

                <div class="large-4 columns">
                    <div class="row">
                        <div class="large-12 columns">
                            <a href="http://d.lib.ncsu.edu/myhuntlibrary">
                                <img src="/sites/default/files/myhunt-front.jpg" alt="Students posing on the monumental stairs" title="photo credit: @emily_reeves12" width="100%" />
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <a href="http://d.lib.ncsu.edu/myhuntlibrary"><h2>MY &#35;HuntLibrary</h2></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adcing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>

                <div class="large-4 columns">
                    <div class="row">
                        <div class="large-6 columns">
                            <a href="/news/"><img src="/sites/default/files/news-front.jpg" alt="girl typing at lap" width="100%" /></a>
                        </div>
                        <div class="large-6 columns">
                            <h2><a href="/news/">News</a></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-6 columns">
                            <a href="/news/"><img src="/sites/default/files/news-front.jpg" alt="girl typing at lap" width="100%" /></a>
                        </div>
                        <div class="large-6 columns">
                            <h2><a href="/news/">News</a></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-6 columns">
                            <a href="/news/"><img src="/sites/default/files/news-front.jpg" alt="girl typing at lap" width="100%" /></a>
                        </div>
                        <div class="large-6 columns">
                            <h2><a href="/news/">News</a></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>

            </div> <!-- /bottom row -->

        </div> <!--/.main region -->
    </main> <!--/.main-->
    <?php if ($messages && $zurb_foundation_messages_modal): print $messages; endif; ?>
</div> <!--/.page -->
