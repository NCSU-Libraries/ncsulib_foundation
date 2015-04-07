<?php
	foreach($row->field_field_location_group as $item):
		$vals = reset($item['rendered']['entity']['field_collection_item']);
		$building = $vals['field_staff_building']['#object']->field_staff_building['und'][0]['entity'];
		$building_name = $building->title;
		$building_address = $building->field_address['und'][0]['value'];
		$office_number = $vals['field_office_location'][0]['#markup'];
?>
	<p>
		<strong><?= $building_name; ?></strong><br/>
		<?php if($office_number){ echo $office_number.'<br/>';} ?>
		<?= $building_address; ?><br/>
	</p>

<?php endforeach; ?>
