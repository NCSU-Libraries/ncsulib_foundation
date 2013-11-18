<?php
	$content = $variables['view']->result[0];
	$img_node = field_get_items('node', node_load($content->nid), 'field_photo');
	$address_node = field_get_items('node', node_load($content->nid), 'field_address');
	$phone_node = field_get_items('node',node_load($content->nid), 'field_phone_number');
?>
<div id="lib-info">
	<div id="lib-photo">
		<a href="<?php echo drupal_lookup_path('alias','node/'.$content->nid); ?>"><img src="<?php echo image_style_url('large',$img_node[0]['uri']);?>" alt="<?php echo $img_node[0]['alt']; ?>" width="100%" /></a>
	</div>
	<div id="lib-meta">
		<h2><a href="<?php echo drupal_lookup_path('alias','node/'.$content->nid); ?>"><?php echo $content->node_title; ?></a></h2>
		<h3>Address</h3>
		<p><?php echo $address_node[0]['value']; ?></p>
		<h3>Information</h3>
		<p><?php echo $phone_node[0]['value']; ?></p>
	</div>
</div>

