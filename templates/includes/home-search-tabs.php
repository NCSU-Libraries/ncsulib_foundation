<!-- search tabs stub -->
<div id="search-tabs">
    <h2>SEARCH</h2>
    <div class="section-container auto search-tabs" data-section>
        <section class="active">
            <p class="title" data-section-title><a href="#panel1">All</a></p>
            <div class="content" data-section-content>
                <form accept-charset="utf-8" method="get" action="/search/" id="searcheverything">
                    <input type="text" id="searchall" value="" name="q" class="main-search-field" placeholder="Search books, articles, journals, &amp; library website" />
                    <input type="submit" class="front-page-submit button small" id="all-submit" value="SEARCH" />
                </form>
            </div>
        </section>
        <section>
            <p class="title" data-section-title><a href="#panel2">Articles</a></p>
            <div class="content" data-section-content>
                <form accept-charset="utf-8" method="get" action="http://ncsu.summon.serialssolutions.com/search" id="search-articles-summon">
                    <input type="text" id="searcharticle" value="" name="s.q" class="articles-search-field" placeholder="Search for articles in Summon." />
                    <input type="submit" id="article-submit" class="front-page-submit button small" value="SEARCH" />

                    <p class="search-example">EX: tropical deforestation or enter a DOI</p>
                    <select id="searcharticleadvanced" name="searcharticleadvanced" class="has_sb">
                        <option value="anywhere">Anywhere</option>
                        <option value="title">Title</option>
                        <option value="author">Author</option>
                    </select>
                    <label class="access" for="peer-reviewed"><input type="checkbox" value="IsPeerReviewed,true" name="s.fvf[]" id="peer-reviewed" class="article-input" /> Peer-reviewed only</label>
                    <p class="search-more"><a href="/articles/" onclick="_gaq.push(['_trackEvent', 'Article Search', 'Internal Link', 'Articles']);">More search options »</a></p>
                    <!-- ncsu.summon.serialssolutions.com hidden inputs -->
                    <input type="hidden" value="ContentType,Book Chapter,f" name="s.fvf[]" />
                    <input type="hidden" class="article-input" value="ContentType,Journal Article" name="s.fvf[]" />
                    <input type="hidden" class="article-input" value="addFacetValueFilters(ContentType,Journal / eJournal)" name="s.cmd" />
                    <input type="hidden" value="true" name="keep_r" />
                </form>
            </div>
        </section>
        <section>
            <p class="title" data-section-title><a href="#panel2">Books &amp; Media</a></p>
            <div class="content" data-section-content>
                <form accept-charset="utf-8" method="get" action="http://catalog.lib.ncsu.edu/" id="searchbooksform">
                    <input type="hidden" value="1" name="Nty">
                    <input type="hidden" value="0" name="N">
                    <input type="hidden" value="" id="sugg" name="sugg">
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

                </form>
            </div>
        </section>
        <section>
            <p class="title" data-section-title><a href="#panel2">Our Website</a></p>
            <div class="content" data-section-content>
                <form accept-charset="utf-8" method="get" action="/search/websearch.php" id="websitesearch">
                    <input type="text" id="searchweb" value="" name="q" class="main-search-field" placeholder="Search the library website">
                    <input type="submit" class="front-page-submit button small prefix" id="web-submit" value="SEARCH" />
                    <p class="search-example">Example: Borrow a Laptop</p>
                </form>
            </div>
        </section>
        <div id="research-options">
            <h6>More Research Tools:</h6>
            <ul>
                <li><a href="/databases/">Databases</a></li>
                <li><a href="/journals/">Journal Titles</a></li>
                <li><a href="/citationbuilder">Citation Builder</a></li>
            </ul>
        </div>
        <ul id="home-quicklinks">
            <li>
                <ul>
                    <li><h5>Techonology</h5></li>
                    <li><a href="#">Create Digital Media</a></li>
                    <li><a href="#">Makerspace</a></li>
                </ul>
            </li>
            <li>
                <ul>
                    <li><h5>Studying</h5></li>
                    <li><a href="#">Reserve a Room</a></li>
                    <li><a href="#">GroupFinder</a></li>
                </ul>
            </li>
            <li>
                <ul>
                    <li><h5>Course</h5></li>
                    <li><a href="#">Course Tools</a></li>
                    <li><a href="#">Course Reserves</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
