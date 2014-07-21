<?php

	$position = $row->field_field_staff_position[0]['rendered']['#title'];

	if($position != 'Staff'){
		echo $position;
	}
