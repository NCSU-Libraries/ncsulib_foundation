<?php
/*
 * Current Exhibits View
 * Path: /exhibits
 * Author: Erik Olson
 * Date: 10/7/13
 */
?>
<?php
	drupal_add_css(drupal_get_path('theme', 'ncsulib_foundation').'/styles/core/custom/exhibits.css', array('weight' => 998, 'group' => 101));
?>
<dl id="exhibits-content">
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
		//$space_node = node_load($space[0]['entity']->nid);
		//$building_field = field_get_items('node', $space_node, 'field_building_name');
		$library = '';//field_view_value('node', $space_node, 'field_building_name', $building_field[0]);
		$ongoing = field_get_items('node', $node, 'field_ongoing');
		$event_url = field_get_items('node', $node, 'field_event_url');
	?>
		<dd class="exhibit-item">
			<div class="row">
				<?php if($img_url): ?>
				<div class="exhibit-photo columns medium-4">
					<img src="<?php echo $img_url; ?>" width="100%" />
				</div>
				<?php endif; ?>
				<div class="exhibit-content columns medium-8">
					<h2 class="subheader"><?php echo $url; ?></h2>
					<?php if($space_title): ?>
						<?php if($space_title == 'Online only'): ?>
							<?php if($event_url): ?>
							<h5 class="subheader">Where: <a href="<?= $event_url[0]['url']; ?>">Online Exhibit</a></h5>
							<?php else: ?>
							<h5 class="subheader">Where: Online Exhibit</h5>
							<?php endif; ?>

						<?php else: ?>
						<h5>Where: <a href="<?php echo url('node/'.$where[0]['target_id']); ?>"><?php echo $space_title; ?></a> at <?php echo $library['#markup']; ?></h5>
						<?php endif; ?>
					<?php endif; ?>
					<?php if(($start_time || $end_time) && !$ongoing): ?>
					<h5 class="subheader">When: <?php echo $start_time . ' - ' . $end_time; ?></h5>
					<?php else: ?>
					<h5 class="subheader">When: Ongoing</h5>
					<?php endif; ?>
				</div>
			</div>
		</dd>
<?php endforeach; ?>
</dl>
