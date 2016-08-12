<?php
	/** EVENTS **/

	/**
	 * Implements theme_field()
	 *
	 * Print the non lib building as ul
	 */
	function ncsulib_foundation_field__field_non_libraries_space__event($variables) {

	  $output .= '<ul>';
	  foreach($variables['items'] as $item){
	    $output .= '<li>'.$item['#markup'].'</li>';
	  }
	  $output .= '</ul>';

	  return $output;
	}

	/**
	 * Implements theme_field()
	 *
	 * Handle event dates
	 */
	function ncsulib_foundation_field__field_time__event($variables) {
	  $output = '<h3>When</h3>';
	  $items = $variables['element']['#items'];

	  if(count($items) > 1){ //if multiple events
	    $output.= '<p>';
	    $dates = $variables['element']['#items'];
	    foreach($dates as $key => $item){
	      // kpr($item);

	      $start_raw = strtotime($items[$key]['value'])+timezoneOffset(strtotime($items[0]['value']));
	      $end_raw = strtotime($items[$key]['value2'])+timezoneOffset(strtotime($items[0]['value2']));
	      $duration = $end_raw - $start_raw;
	      $d_hour = floor($duration/60/60);
	      $d_min = ($duration/60/60 - $d_hour)*60;

	      $output .= '<time itemprop="startDate" datetime="'.date('Y-m-d',$start_raw).'T'.date('G:i',$start_raw).'">'.date('F j', $start_raw).'</time>';
	      $output .= '<time itemprop="duration" datetime="T'.$d_hour.'H'.$d_min.'M"></time>';
	      if(count($dates) > $key+1){
	        $output .= ', ';
	      } else{
	        $output .= ', '.date('Y', $start_raw);
	      }
	    }
	      $output .= '<br>';
	      $output .= date('g:ia', $start_raw).' - '.date('g:ia', $end_raw);
	      $output.= '</p>';
	  } else{
	    $start_raw = strtotime($items[0]['value'])+timezoneOffset(strtotime($items[0]['value']));
	    $end_raw = strtotime($items[0]['value2'])+timezoneOffset(strtotime($items[0]['value2']));
	    $duration = $end_raw - $start_raw;
	    $d_hour = floor($duration/60/60);
	    $d_min = ($duration/60/60 - $d_hour)*60;

	    // if a one day or mult day event
	    if(date('z', $start_raw) == date('z', $end_raw)){ //one day
	      $output .= '<p>';
	      $output .= '<time itemprop="startDate" datetime="'.date('Y-m-d',$start_raw).'T'.date('G:i',$start_raw).'">'.date('F j, Y', $start_raw).'</time>';
	      $output .= '<br>';
	      $output .= date('g:ia', $start_raw).' - '.date('g:ia', $end_raw);
	      $output .= '<time itemprop="duration" datetime="T'.$d_hour.'H'.$d_min.'M"></time>';
	      $output .= '</p>';
	    } else{ //mult day
	      $output .= '<p>';
	      $output .= '<time itemprop="startDate" datetime="'.date('Y-m-d',$start_raw).'T'.date('G:i',$start_raw).'">'.date('F j', $start_raw).' - '.date('F j, Y', $end_raw).'</time>';
	      $output .= '<br>';
	      $output .= date('g:ia', $start_raw).' - '.date('g:ia', $end_raw);
	      $output .= '<time itemprop="duration" datetime="T'.$d_hour.'H'.$d_min.'M"></time>';
	      $output .= '</p>';
	    }

	    $output .= '';
	  }

	  return $output;
	}

	function timezoneOffset($str){
	  if($str){
	    $tz_offset = strtotime(date("M d Y H:i:s", $str)) - strtotime(gmdate("M d Y H:i:s", $str));
	  } else{
	    $tz_offset = strtotime(date("M d Y H:i:s")) - strtotime(gmdate("M d Y H:i:s"));
	  }
	  return $tz_offset;
	}


	/**
	 * Implements theme_field()
	 *
	 * Print the building along with the room name
	 */
	function ncsulib_foundation_field__field_space__event($variables) {
	  $output = '';

	  // Render the label, if it's not hidden.
	  if (!$variables['label_hidden']) {
	    $output .= '<h3' . $variables['title_attributes'] . '>' . $variables['label'] . '</h3>';
	  }
	  // kpr($variables);
	  $output .= '<ul class="field-items"' . $variables['content_attributes'] . '>';
	  // Render the items as a comma separated inline list
	  foreach ($variables['items'] as $delta => $item) {
	    $space_nid = $variables['element']['#items'][$delta]['entity']->nid;
	    $space_node = node_load($space_nid);
	    $building = node_load($space_node->field_building_new_['und'][0]['target_id']);
	    $building_title = $building->title;
	    $entry_fee = node_load($space_node->field_entry_fee['und'][0]['target_id']);
	    $entry_fee_val = ($entry_fee) ? $entry_fee : '0.00';

	    $space_title = str_replace(array('(Hill)','(Hunt)'),'',$space_node->title);
	    // Print space name
	    if($building_title){
	      $output .= '<li>' . drupal_render($item). ' at the '.$building_title;
	    } else{
	      $output .= '<li>' . drupal_render($item);
	    }

	    // schema.org
	      $b_nid = $space_node->field_building_new_['und'][0]['target_id'];
	      $b_node = node_load($b_nid);
	      if($b_node){
	        $b_address = field_get_items('node', $b_node, 'field_address');
	        $b_address = $b_address[0]['value'];

	        $output .= '<div itemprop="location" itemscope itemtype="http://schema.org/Place" class="hide">';
	        $output .= '<div itemprop="name">'.$b_node->title.'</div>';
	        $output .= '<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
	        $output .= '<div itemprop="name">'.$space_title.' at the '.$b_node->title.'</div>';
	        $output .= '<div itemprop="streetAddress">'.$b_address.'</div>';
	        $output .= '</div>';
	        $output .= '</div>';
	        $output .= '<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	        <span itemprop="price" content="'.$entry_fee_val.'"></span>
	        <meta itemprop="priceCurrency" content="USD" />
	        <meta itemprop="url" content="http://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI].'" />
	        <link itemprop="availability" href="http://schema.org/InStock">
	        </div>';
	      }

	        // Load building info, if present, print it
	        $building_field = field_get_items('node', $space_node, 'field_building_name');
	        $building_yes = !empty($building_field);
	        if (!empty($building_field)) {
	          $building_out = field_view_value('node', $space_node, 'field_building_name', $building_field[0]);
	          $output .= ' at the '. drupal_render($building_out) .'</li>';
	        }

	    $output .= '</li>';

	  }
	  $output .= '</ul>';

	  return $output;
	}

	/**
	 * Implements theme_field()
	 *
	 * Make collaborators show up with name, title and thumbnail image
	 */
	function ncsulib_foundation_field__field_event_leads__event($variables) {
	  $output = '';

	  // Render the label, if it's not hidden and display it as a heading 2
	  if (!$variables['label_hidden']) {
	    $output .= '<h3' . $variables['title_attributes'] . '>' . $variables['label'] . '</h3>';
	  }

	  // Load all collaborators' fields
	  $collaborators = array();
	  foreach ($variables['element']['#items'] as $key => $value) {
	    $collaborators[] = user_load($value['target_id']);

	    // Add link to user's page
	    $staff_link = 'staff/'. $collaborators[$key]->name;
	    $variables['items'][$key]['link'] = $staff_link;

	    // Add user's image
	    $variables['items'][$key]['image'] = get_user_image($collaborators[$key]);
	    // $variables['items'][$key]['image']['#path']['path'] = $staff_link;

	    // Add user's title
	    $field = field_get_items('user', $collaborators[$key], 'field_title');
	    $variables['items'][$key]['title'] = field_view_value('user', $collaborators[$key], 'field_title', $field[0]);

	  }

	  // The HTML template for user info
	  foreach ($variables['items'] as $delta => $item) {
	    $output .= '<div class="user-info">';
	    $output .= '<div class="user-photo">'. render($item['image']) .'</div>';
	    $output .= '<div class="user-details">';
	    $output .= '<span class="user-name" itemprop="author" content="">'. l(render($item), $item['link']) .'</span>';
	    $output .= '<span class="user-title">'. render($item['title']) .'</span>';
	    $output .= '</div>';
	    $output .= '</div>';

	  }

	  return $output;
	}

	/**
	 * Implements theme_field()
	 *
	 * Turns field labels into heading3
	 */
	function ncsulib_foundation_field__event($variables) {
	  $output = '';

	  // Render the label, if it's not hidden and display it as a heading 2
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
