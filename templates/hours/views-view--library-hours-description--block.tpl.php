<?php
	foreach($variables['view']->result as $data):
?>
	<h2 class="subheader">
		<?php
			$node=hours_get_node_by_field_value('library', 'field_library_short_name', segment(1), 'title');
			echo ($data->node_title == 'General') ? $node->title: $data->node_title;
		?>
	</h2>
	<?php
		if($data->node_title == 'General'){
			$body = field_get_items('node', node_load($node->nid), 'body');
			echo $body[0]['value'];
		} else{
			$body = field_get_items('node', node_load($data->nid), 'body');
			echo $body[0]['value'];
		}
	?>
<?php endforeach; ?>
