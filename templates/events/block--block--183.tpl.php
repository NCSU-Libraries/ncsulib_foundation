<section class="block block-views">
    <div id="scrc-news">
        <h2>More Citizen Science News</h2>
        <dl>
        <?php
            $xml = file_get_contents('https://news.ncsu.edu/tag/citizen-science/feed/');
            $feed = simplexml_load_string($xml);

            for($i=0;$i<3;$i++):
                $title = $feed->channel->item[$i]->title;
                $description = substr($feed->channel->item[$i]->description, 0, 150).'...';
                $link = $feed->channel->item[$i]->link;
                $date = date('M d, Y',strtotime($feed->channel->item[$i]->pubDate));

                $content = $feed->channel->item[$i]->children('http://purl.org/rss/1.0/modules/content/');
                preg_match('/<img.*?src="(.*?)"/si',$content->encoded,$img);
                $img_url = preg_split('/http:\/\//si', $img[1]);
        ?>
            <dd>
                <p><a href="<?php echo $link; ?>" target="_blank" style="font-size:1.2rem;"><?php echo $title ?></a></p>
                <p><?php echo $description; ?>
                <a href="<?php echo $link; ?>" target="_blank">Read More</a><br/><br/></p>
            </dd>

        <?php endfor; ?>
        </dl>
        <div class="view-all">
            <a href="https://news.ncsu.edu/tag/citizen-science/" class="styled">View all</a>
        </div>
    </div>
</section>
