<?php
	/**
	 * Getting an image render array
	 */
	function get_user_image($user) {
	  $image_array = array();

	  if (field_get_items('user', $user, 'field_staff_photo')) {
	      $image = field_get_items('user', $user, 'field_staff_photo');
	      $image_array = field_view_value('user', $user, 'field_staff_photo', $image[0], array(
	        'type' => 'image',
	        'settings' => array(
	          'image_style' => 'half-page-width',
	          'image_link' => 'content',
	        ),
	      ));
	      $image_array['#path']['path'] = 'staff/'.$user->name;
	    } else {
	     $image_array  = ' ';//<img src="/sites/default/files/gender_neutral-1.jpg">';
	    }
	  return $image_array;
	}


	/**
	 * Implements theme_username()
	 */
	function ncsulib_foundation_username($variables) {
	    $author = user_load($variables['uid']);
	    $photo = get_user_image($author);

	    // full path to photo
	    $style = $photo['#image_style'];
	    $photo_item = $photo['#item'];
	    $uri = $photo_item['uri'];

	    if(strlen($uri) > 1){
	        $img = '<img src="'.image_style_url($style,$uri).'" width="100%"/>';
	    } else{
	        $img = '';
	    }

	    // Add user's title
	    $field_title = field_get_items('user', $author, 'field_title');
	    $title = field_view_value('user', $author, 'field_title', $field_title[0]);
	    $field_position = field_get_items('user', $author, 'field_staff_position');
	    $position_id = $field_position[0]['tid'];
	    $staff_bio = field_get_items('user', $author, 'field_external_bio_page');
	    $staff_bio_url = $staff_bio[0]['value'];

	    //2023 and 2050 are former staff.
	    // kpr($variables);
	    if($staff_bio){
	        $staff_url = $staff_bio_url;
	    } else{
	        $staff_url = '/staff/'.$author->name;
	    }

	    if(urlsegment(0) == 'news'){ //just for author on /news pages
	        $output = '<div class="user-details">';
	        $output .= '<span class="user-name username" itemprop="author" content="'.$variables['name'].'"><a href="'.$staff_url.'">'.$variables['name'].'</a></span>';
	        $output .= '</div>';
	        $output  = '<div class="user-info">'. $output .'</div>';
	    } else if (isset($variables['link_path']) && $position_id != '2023' && $position_id != '2050') {
	        // We have a link path, so we should generate a link using l().
	        $output = '<div class="user-photo"><a href="'.$staff_url.'">'. $img .'</a></div>';
	        $output .= '<div class="user-details">';
	        $output .= '<span class="user-name" itemprop="author" content="'.$variables['name'].'"><a class="username" href="'.$staff_url.'">'.$variables['name'].'</a></span>'; //'. l($variables['name'] . $variables['extra'], $variables['link_path'], $variables['link_options']) .'</span>';
	        $output .= '<span class="user-title">'. render($title) .'</span>';
	        $output .= '</div>';
	        $output  = '<div class="user-info">'. $output .'</div>';
	    } else {
	        // Modules may have added important attributes so they must be included
	        // in the output. Additional classes may be added as array elements like
	        $output  = '<div class="user-photo">'. $img .'</div>';
	        $output .= '<div class="user-details">';
	        $output .= '<span class="user-name username" itemprop="author" content="'.$variables['name'].'">'.$variables['name'].'</span>'; //'. l($variables['name'] . $variables['extra'], $variables['link_path'], $variables['link_options']) .'</span>';
	        $output .= '<span class="user-title">'. render($title) .'</span>';
	        $output .= '</div>';
	        $output  = '<div class="user-info">'. $output .'</div>';
	    }
	    return $output;
	}




	/**
	 * Implements theme_field()
	 *
	 * Make collaborators show up with name, title and thumbnail image
	 */
	function ncsulib_foundation_field__field_contact($variables) {
	  $output = "";

	  $uid = $variables['element']['#items'][0]['target_id'];
	  $contact = user_load($uid);
	  $photo = get_user_image($contact);

	  // First name
	  $field = field_get_items('user', $contact, 'field_firstname');
	  $first_name = field_view_value('user', $contact, 'field_firstname', $field[0]);
	  $name = render($first_name);

	  // Last Name
	  $field = field_get_items('user', $contact, 'field_lastname');
	  $last_name = field_view_value('user', $contact, 'field_lastname', $field[0]);
	  $name .= " " . render($last_name);

	  // Link to user's page
	  $unity_id = $variables['element']['#items'][0]['entity']->name;
	  $link = '<a href="/staff/' . $unity_id . '">' . $name . '</a>';

	  // Contact photo
	  $photo = get_user_image($contact);
	  if($contact->field_staff_photo){
	    $photo_html = '<a href="/staff/' . $unity_id . '">' . '<img src="https://www.lib.ncsu.edu/sites/default/files/styles/half-page-width/public/'.$photo['#item']['filename'].'" /></a>';
	  } else{
	    $photo_html = '<a href="/staff/' . $unity_id . '">' . '<img src="https://www.lib.ncsu.edu/sites/default/files/gender_neutral-1.jpg"></a>';
	  }

	  // Contact title
	  $field = field_get_items('user', $contact, 'field_title');
	  $field_title = field_view_value('user', $contact, 'field_title', $field[0]);
	  $title = render($field_title);

	  // Render the label, if it's not hidden.
	  if (!$variables['label_hidden']) {
	    $output .= '<h3' . $variables['title_attributes'] . '>' . $variables['label'] . '</h3>';
	  }

	  $output .=  '<div class="user-info">';
	  $output .= '<div class="user-photo">' . $photo_html . '</div>';
	  $output .= '<div class="user-details">';
	  $output .= '<span class="user-name" itemprop="author" content="'.$name.'">' . $link . '</span>';
	  $output .= '<span class="user-title">' . $title . '</span>';
	  $output .= '</div>';
	  $output .= '</div>';

	  return $output;
	}

	/**
	 * Implements theme_field()
	 *
	 * Make collaborators show up with name, title and thumbnail image
	 */
	function ncsulib_foundation_field__field_staff($variables) {
	  $output = '';

	  // Load all collaborators' fields
	  $collaborators = array();
	  foreach ($variables['element']['#items'] as $key => $value) {
	    $collaborators[] = user_load($value['target_id']);

	    // Account status
	    $status = $collaborators[$key]->status;
	    $variables['items'][$key]['status'] = $status;

	    // First name
	    $field = field_get_items('user', $collaborators[$key], 'field_firstname');
	    $first_name = field_view_value('user', $collaborators[$key], 'field_firstname', $field[0]);
	    $variables['items'][$key]['name'] = render($first_name);

	    // Last Name
	    $field = field_get_items('user', $collaborators[$key], 'field_lastname');
	    $last_name = field_view_value('user', $collaborators[$key], 'field_lastname', $field[0]);
	    $variables['items'][$key]['name'] .= " " . render($last_name);

	    // Link to user's page
	    $variables['items'][$key]['link'] = 'staff/'. $collaborators[$key]->name;

	    // Image
	    $variables['items'][$key]['image'] = get_user_image($collaborators[$key]);

	    // Title
	    $field = field_get_items('user', $collaborators[$key], 'field_title');
	    $variables['items'][$key]['title'] = field_view_value('user', $collaborators[$key], 'field_title', $field[0]);

	    // Position
	    $field = field_get_items('user', $collaborators[$key], 'field_staff_position');
	    $variables['items'][$key]['position'] = field_view_value('user', $collaborators[$key], 'field_staff_position', $field[0]);

	  }

	  return print_multiple_users($variables['items'], $output);
	}

	/**
	 * The HTML template for user info
	 * @param $user_array Multiple renderable Drupal user arrays
	 * @param   $output The already existing output string
	 * @return $output HTML for display
	 */
	function print_multiple_users($user_array, $output) {

	  foreach ($user_array as $delta => $item) {
	    $status = $item['status'];
	    $img_item = $item['image']['#item'];
	    $uri = $img_item['uri'];
	    $photo_url = '<img src="'.image_style_url($item['image']['#image_style'],$uri).'" width="100%"/>';

	    $position_id = $item['position']['#options']['entity']->tid;
	    if($position_id == '2050' || $position_id == '2023' || $position_id == '2024' || $position_id == '2353' || $position_id == '2014'){
	        $staff_url = render($item['name']);
	    } else{
	        $staff_url = l(render($item['name']), $item['link']);
	    }

	    if(is_array($item['image'])){
	        if($status == 0 || $position_id == '2353' || $position_id == '2024'){
	            $img = $photo_url;
	        } else{
	            $img = render($item['image']);
	        }
	    } else{
	        $img = '<img src="https://www.lib.ncsu.edu/sites/default/files/gender_neutral-1.jpg">';
	    }

	    $output .= '<div class="user-info">';
	    // If user is a former employee, only print name, else print name, link and title
	    switch ($status) {
	      case 0:
	        $output .= '<div class="user-photo">'. $img .'</div>';
	        $output .= '<div class="user-details">';
	        $output .= '<span class="user-name" itemprop="author" content="'.$item['name'].'">'.$staff_url.'</span>';
	        $output .= '<span class="user-title">'. render($item['title']) .'</span>';
	        break;

	      default:
	        $output .= '<div class="user-photo">'. $img .'</div>';
	        $output .= '<div class="user-details">';
	        $output .= '<span class="user-name" itemprop="author" content="'.$item['name'].'">'. $staff_url .'</span>';
	        $output .= '<span class="user-title">'. render($item['title']) .'</span>';
	        break;
	    }
	    $output .= '</div>';  // .user-details
	    $output .= '</div>';  // .user-info
	  }

	  return $output;
	}
?>
