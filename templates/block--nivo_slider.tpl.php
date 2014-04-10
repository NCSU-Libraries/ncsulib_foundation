<?php
	$slider_vars = variable_get('nivo_slider_banner_settings', array());
?>
<ul class="orbit-slider" data-orbit="">

<?php
	foreach($slider_vars as $slide):
		if($slide['published']):
		$file = file_load($slide['fid']);
		$url = $slide['url'];
?>
    <li><a href="<?= $url; ?>"><img src="<?= file_create_url($file->uri); ?>" /></a></li>
	<?php endif; ?>
<?php endforeach; ?>

</ul>
