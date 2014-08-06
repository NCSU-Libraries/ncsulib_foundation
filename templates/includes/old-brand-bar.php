<!-- <div id="ncsu_branding_bar">
	<div>
		<div class="" id="ncsu_branding_bar_container">
			<div class="row">
				<div class="columns medium-3">
					<a title="North Carolina State University" href="http://www.ncsu.edu/"><img id="ncsu_logo" src="/website/images/ncsu_logo.png" alt="NCSU Logo" /></a>
				</div>
				<div class="columns medium-9">
					<ul class="inline-list">
						<li class="first"><a href="http://www.ncsu.edu/directory/">directory</a></li>
						<li><a href="http://www.lib.ncsu.edu/">libraries</a></li>
						<li><a href="http://mypack.ncsu.edu/">mypack portal</a></li>
						<li><a href="http://www.ncsu.edu/campus_map/">campus map</a></li>
						<li><a href="http://search.ncsu.edu/">search NCSU</a></li>
				    </ul>
				</div>
			</div>
		</div>
	</div>
</div> -->


<link rel="stylesheet" type="text/css" href="/sites/all/themes/ncsulib_foundation/templates/includes/old-branding-bar.css">
<div id="utility_bar">

        <div id="head_in">

          <div class="logo"><a href="http://www.ncsu.edu/" title="North Carolina State University Homepage">North Carolina State University</a></div>

            <div role="navigation" aria-label="University Resources">

                <ul id="topnav">
                    <li><a href="http://www.ncsu.edu/directory/" title="Campus Directory">Campus Directory</a></li>
                    <li><a href="http://www.lib.ncsu.edu/" title="Libraries">Libraries</a></li>
                    <li><a href="http://mypack.ncsu.edu/" title="MyPack Portal">MyPack Portal</a></li>
                    <li><a href="http://www.ncsu.edu/campus_map/" title="Campus Map">Campus Map</a></li>
                    <li class="last"><a href="http://search.ncsu.edu/" onClick="swaptabs('open','utility_bar'); return false;" title="Search">Search NCSU.EDU</a></li>
                </ul>

            </div>

        </div>

    </div>


    <div id="ncsu_bar">

        <div id="open">

            <div class="logo"><a href="http://www.ncsu.edu/" title="North Carolina State University Homepage">North Carolina State University</a></div>

            <form action="http://www.google.com/search" method="get" name="mySearch" id="mySearch" class="sitesearch_form" role="search">

                <input type="hidden" name="as_sitesearch" value="ncsu.edu" />


                <fieldset>

                    <legend>Search:</legend>

                    <input type="radio" name="hq" id="search_site" value="inurl:" />
                    <label for="search_site">Search this Site</label>

                    <input name="hq" type="radio" id="ncsu" value="inurl:ncsu.edu" checked="checked" />
                    <label for="ncsu">NCSU</label>

                </fieldset>


                <label for="search" class="access">Google Search</label>
                <input name="q" type="text" size="18"  id="search" value="Search ncsu.edu" aria-label="Google Search"
                    onFocus="if(this.value=='Search ncsu.edu'){ value=''; } this.className='active';"
                    onBlur="if(this.value==''){value='Search ncsu.edu';} this.className='';" />
                <input class="btn_qlinks" src="images/head_btn_search.gif" id="search_button" alt="search" title="search" type="image" />
                <input class="btn_close" src="images/head_btn_close.gif" id="closeh_button" alt="close" title="close" type="image"  onClick="swaptabs('utility_bar','open'); return false;" />

            </form>

        </div>

    </div>
