<select>
	<option value="">- Select a Department -</option>
	<?php foreach($view->result as $result): ?>
	<option value="<?php echo $result->nid; ?>"><?php echo $result->node_title; ?></option>
	<?php endforeach; ?>
</select>
