<!-- why is this not working? -->
<?php
	$slider_vars = variable_get('nivo_slider_banner_settings', array());
?>
<ul id="artbox" class="orbit-slider" data-orbit>

<?php
	foreach($slider_vars as $slide):
		if($slide['published']):
		$file = file_load($slide['fid']);
		$url = $slide['url'];
		preg_match('/\/\/(.*?)\//si', $url, $url_domain);
		$url_pos = strpos($url_domain[1], 'lib.ncsu.edu');
		if($url_pos){
			$url_dest = 'internal';
		} else{
			$url_dest = 'external';
		}
		$title = $slide['title'];

?>
    <li><a href="<?= $url; ?>" data-title="<?= $title; ?>" data-destination="<?= $url_dest; ?>"><?= $title; ?><img src="https://lib.ncsu.edu/sites/default/files/banner/<?= $file->filename; ?>" alt="<?= $title; ?>" /></a></li>
	<?php endif; ?>
<?php endforeach; ?>

</ul>
