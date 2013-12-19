<?php
/*
 * Past Exhibits View
 * Path: /exhibits
 * Author: Erik Olson
 * Date: 7/2/13
 */
?>
<ul id="exhibits-content">
<?php foreach($variables['view']->result as $val): ?>

	<?php
		$node = node_load($val->nid);
		$space = field_get_items('node', $node, 'field_space');
		$space_title = $space[0]['entity']->title;
		$time = field_get_items('node', $node, 'field_time');
		$start_time = date('F j, Y', strtotime($time[0]['value']));
		$end_time = date('F j, Y', strtotime($time[0]['value2']));
		$body_node = field_get_items('node', $node, 'body', array('type' => 'text_summary_or_trimmed'));
		$body_summary = $body_node[0]['safe_summary'];
		$body_full = $body_node[0]['value'];
		$body = ($body_summary == '') ? $body_full : $body_summary;
		$where = field_get_items('node', $node, 'field_space');
		$url_field = field_get_items('node', $node, 'field_event_url');
		$url = ($url_field == '') ? '<a href="'. url("node/".$val->nid) .'">'. $val->node_title . '</a>' : '<a href="'. $url_field[0]['url'] .'">'. $val->node_title . '</a>';
		$img = field_get_items('node', $node, 'field_image_for_event');
		$img_url = image_style_url('half-page-width', $img[0]['uri']);
		$space_node = node_load($space[0]['entity']->nid);
		$building_field = field_get_items('node', $space_node, 'field_building_name');
		$library = field_view_value('node', $space_node, 'field_building_name', $building_field[0]);
	?>

		<li class="exhibit-item row">
			<?php if($img_url): ?>
			<div class="exhibit-photo large-4 columns">
				<img src="<?php echo $img_url; ?>" width="100%" />
			</div>
			<?php endif; ?>
			<div class="exhibit-content large-8 columns">
				<h2><?php echo $url; ?></h2>
				<?php if($space_title): ?>
				<h4>Where: <a href="<?php echo url('node/'.$where[0]['target_id']); ?>"><?php echo $space_title; ?></a> at <?php echo $library['#markup']; ?></h4>
				<?php endif; ?>
				<?php if($start_time || $end_time): ?>
				<h4>When: <?php echo $start_time . ' - ' . $end_time; ?></h4>
				<?php endif; ?>
				<?php if($body): ?>
				<?php echo $body; ?>
				<?php endif; ?>
			</div>
		</li>
<?php endforeach; ?>
</ul>
