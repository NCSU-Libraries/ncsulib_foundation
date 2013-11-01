<div id="scrc-news">
	<h2>Latest News</h2>
	<ul id="news-feed">
	<?php
		$xml = file_get_contents('http://feeds.feedburner.com/NCSULibrariesHistoricallyStated?format=xml');
		$feed = simplexml_load_string($xml);

		for($i=0;$i<2;$i++):
			$title = $feed->channel->item[$i]->title;
			$description = substr($feed->channel->item[$i]->description, 0, 200).'...';
			$link = $feed->channel->item[$i]->link;
			$date = date('M d, Y',strtotime($feed->channel->item[$i]->pubDate));

			$content = $feed->channel->item[$i]->children('http://purl.org/rss/1.0/modules/content/');
			preg_match('/<img.*?src="(.*?)"/si',$content->encoded,$img);
			$img_url = preg_split('/http:\/\//si', $img[1]);
	?>
		<li>
			<div class="img">
				<img src="<?php echo 'http://'.$img_url[1]; ?>" width="100%" />
			</div>
			<div class="content">
				<h3><a href="<?php echo $link; ?>"><?php echo $title ?></a></h3>
				<p class="date"><?php echo $date; ?></p>
				<p><?php echo $description; ?></p>
				<a href="<?php echo $link; ?>">Read More</a>
			</div>
		</li>

	<?php endfor; ?>
	</ul>
	<div class="view-all">
		<a href="http://news.lib.ncsu.edu/scrc/">View all SCRC news >></a>
	</div>
</div>
