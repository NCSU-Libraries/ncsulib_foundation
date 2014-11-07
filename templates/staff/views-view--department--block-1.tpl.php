<select id="department-select" onchange="window.location=this.options[this.selectedIndex].value">
    <option value="">- Select a Department -</option>
    <?php
		foreach($view->result as $result):
			$url = str_replace(' ', '-',$result->node_title);
            $short_name = $result->field_field_department_short_name[0]['raw']['value'];
	?>

	<option value="/1staff/results?department=<?= $short_name; ?>"><?= $result->node_title; ?></option>

	<?php endforeach; ?>
</select>
