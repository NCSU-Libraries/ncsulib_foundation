<?php
	$i = 0;
	foreach($row->field_field_location_group as $item):
		$i++;
		$vals = $item['rendered']['entity']['field_collection_item'][$i];
		$phone = $vals['field_staff_phone_number'][0]['#markup'];
		$office_number = $vals['field_office_location'][0]['#markup'];
		$building = $vals['field_staff_building']['#object']->field_staff_building['und'][0]['entity'];
		$building_name = $building->title;
		$building_address = $building->field_address['und'][0]['value'];
?>
	<p>
		<strong><?= $building_name; ?></strong><br/>
		<?= $office_number; ?><br/>
		<?= nl2br($building_address); ?><br/>
		<a href="tel:<?= $phone; ?>"><?= $phone; ?></a>
	</p>

<?php endforeach; ?>

