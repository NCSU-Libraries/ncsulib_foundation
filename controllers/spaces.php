<?php
	/** SPACES **/

	/**
	 * Implements theme_field()
	 *
	 * Using this to change the markup delivered to the Building field on Space
	 * nodes
	 */
	function ncsulib_foundation_field__field_building_new___space($variables) {
	  $output = '';
	  $output = '<h3 class="subheader">'.$variables['items'][0]['#markup'].'</h3>';
	  return $output;
	}
	function ncsulib_foundation_field__field_capacity__space($variables) {
	  $output = '';
	  $output .= '<span class="room-capacity">Capacity:&nbsp;' . drupal_render($variables['items'][0]) . '</span>';
	  return $output;
	}
	function ncsulib_foundation_field__field_floor__space($variables) {
	  $output = '';
	  $output .= '<span class="room-floor">' . drupal_render($variables['items'][0]) . '</span>';
	  return $output;
	}
	function ncsulib_foundation_field__field_staff_contact__space($variables) {
	  $contact_name = $variables['element']['#object']->field_staff_contact['und'][0]['entity']->realname;
	  $contact_email = $variables['element']['#object']->field_staff_contact['und'][0]['entity']->mail;
	  $contact_phone = $variables['element']['#object']->field_staff_contact['und'][0]['entity']->field_staff_phone_number['und'][0]['value'];
      $output = $contact_name.'<br /><br /><a href="mailto:'.$contact_email.'">'.$contact_email.'</a><br /><br /><a href="tel:'.$contact_phone.'">'.$contact_phone;
	  return $output;
	}



	/**
	 * Implements theme_field()
	 *
	 * Using this to change the markup delivered to the Reservation Method
	 * field.  Turning it into a button.
	 */
	function ncsulib_foundation_field__field_reservation_method__space($variables) {
	  $output = '';

	  // Create a button based on the method chosen
	  $res_method   = $variables['items'][0]['#markup'];
	  $nid          = $variables['element']['#object']->nid;
	  $node         = node_load($nid);

	  switch ($res_method) {
	    case 'By Room Reservation System':
	      $room_res_url  = field_get_items('node', $node, 'field_room_res_url');
	      $output = '<a href="'.$room_res_url[0]['value'].'" class="button tiny styled">View Reservation Options</a>';
	      break;

	    case 'By Mediated Email Form':
	      $request_form_url = field_get_items('node', $node, 'field_request_form_url');
	      $form_url  = field_view_value('node', $node, 'field_request_form_url', $request_form_url[0]);
	      $output = '<a class="button tiny styled" href="'. $form_url['#element']['url'] .'">Request this room</a>';
	      break;

	    case 'Not Reservable':
	      $output = '';
	      break;
	    default:
	      $output = ' ';
	      break;
	  }
	  return $output;
	}

	/**
	 * Implements theme_field()
	 *
	 * Make room numbers a comma separated list
	 */
	function ncsulib_foundation_field__field_room_number__space($variables) {
	  $output = '';

	  // Render the label, if it's not hidden.
	  if (!$variables['label_hidden']) {
	    $output .= '<h3' . $variables['title_attributes'] . '>' . $variables['label'] . '</h3>';
	  }

	  // Render the items as a comma separated inline list

	  if (count($variables['items']) > 1) {
	    $output .= '<span class="room-list">Rooms:&nbsp;';
	    // $output .= '<ul class="room-numbers"' . $variables['content_attributes'] . '>';
	    for ($i=0; $i < count($variables['items']); $i++) {
	      $output .= drupal_render($variables['items'][$i]);
	      $output .= ($i == count($variables['items'])-1) ? '' : ', ';
	    }
	    $output .= '</span>';
	    // $output .= '</ul>';
	  } else {
	    $output .= '<div class="room-numbers"><span class="room-list">Room:&nbsp;' . drupal_render($variables['items'][0]) . '</span></div>';
	  }

	  // Building map
	  $building_value = $variables['element']['#object']->field_building_name['und'][0]['value'];
	  switch ($building_value) {
	    case 'hill':
	      $output .= '<div class="building-map"><a href="/libmaps"><i class="fa fa-map-marker"></i> building map</a></div>';
	      break;

	    case 'hunt':
	      $output .= '<div class="building-map"><a href="/sites/default/files/files/pdfs/HuntLibrary-detailed-map.pdf"><i class="fa fa-map-marker"></i> building map</a></div>';
	      break;

	    default:
	      $output .= '';
	      break;
	  }


	  return $output;
	}

	/**
	 * Implements theme_field()
	 *
	 * Make an unordered list
	 */
	function ncsulib_foundation_field__field_policies__space($variables) {
	  $output = '';

	  // Render the label, if it's not hidden.
	  if (!$variables['label_hidden']) {
	    $output .= '<h3' . $variables['title_attributes'] . '>' . $variables['label'] . '</h3>';
	  }

	  // Render the items as a comma separated inline list
	  $output .= '<ul class="field-items"' . $variables['content_attributes'] . '>';

	  foreach ($variables['items'] as $delta => $item) {
	    $output .= '<li>' . drupal_render($item) . '</li>';
	  }


	  $output .= '</ul>';

	  return $output;
	}

	/**
	 * Implements theme_field()
	 *
	 * Make an unordered list
	 */
	function ncsulib_foundation_field__field_get_help__space($variables) {
	  $output = '';

	  // Render the label, if it's not hidden.
	  if (!$variables['label_hidden']) {
	    $output .= '<h3' . $variables['title_attributes'] . '>' . $variables['label'] . '</h3>';
	  }

	  // Render the items as a comma separated inline list
	  $output .= '<ul class="field-items"' . $variables['content_attributes'] . '>';

	  foreach ($variables['items'] as $delta => $item) {
	    $output .= '<li>' . drupal_render($item) . '</li>';
	  }


	  $output .= '</ul>';

	  return $output;
	}


	/**
	 * Implements theme_field()
	 *
	 * Turns field labels into heading3
	 */
	function ncsulib_foundation_field__space($variables) {
	  $output = '';

	  // Render the label, if it's not hidden and display it as a heading 3
	  if (!$variables['label_hidden']) {
	    $output .= '<h3' . $variables['title_attributes'] . '>' . $variables['label'] . '</h3>';
	  }

	  // Render the items.
	  $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
	  foreach ($variables['items'] as $delta => $item) {
	    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
	    $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
	  }
	  $output .= '</div>';

	  // Render the top-level DIV.
	  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

	  return $output;
	}

?>
