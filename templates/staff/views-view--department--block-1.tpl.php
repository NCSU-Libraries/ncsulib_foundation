<select id="department-select" onchange="window.location=this.options[this.selectedIndex].value">
	<option value="">- Select a Department -</option>
	<?php
		foreach($view->result as $result):
			$url = str_replace(' ', '-',$result->node_title);
	?>

	<option value="/1staff/results?title=<?= $result->node_title; ?>"><?= $result->node_title; ?></option>

	<?php endforeach; ?>
</select>
