<!-- Charlie, I had to rewrite this because it was the only way I knew how to add the responsive classes.  -->
<?php drupal_add_js('sites/all/themes/ncsulib_foundation/scripts/roomreservations.js', 'file'); ?>
<?php echo $header; ?>

<?php
	foreach($variables['view']->result as $data){
		$node = node_load($data->nid);
		$img_node = field_get_items('node', $node, 'field_image');
		$reserve_btn_obj = $node->field_room_res_id;
		$reserve_btn_id = $reserve_btn_obj['und']['0']['value'];
		$body = $node->body;
?>
	<div class="res-room panel">
		<div class="row">
			<div class="column large-4">
				<div class="res-photo">
					<a href="<?php echo drupal_lookup_path('alias','node/'.$data->nid); ?>"><img src="<?php echo image_style_url('thumbnail',$img_node[0]['uri']);?>" alt="<?php echo $img_node[0]['alt']; ?>" width="100%" /></a>
				</div>
				<p>Capacity: <strong><?php echo $node->field_capacity['und'][0]['value']; ?></strong></p>
			</div>
			<div class="column large-6">
				<h3><?php print_r($data->node_title); ?></h3>
				<?php print_r($body['und'][0]['value']); ?>
				<p><a href="#" class="policies">Reservation and Use Guidelines[+]</a></p>
				<ul class="res-guidelines">
					<?php foreach($node->field_policies['und'] as $guideline): ?>
					<li><?php echo $guideline['value']; ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="column large-2 res-button-wrap">
				<a class="res-button small button" href="http://www.lib.ncsu.edu/roomreservations/schedule.php?date=<?php echo date('m-d-Y'); ?>&scheduleid=<?php echo $reserve_btn_id; ?>">Reserve</a>
			</div>
		</div>
	</div>

<?php } ?>
