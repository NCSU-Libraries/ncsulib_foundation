<?php

/** GLOBALS **/

/**
 * Implements theme_field()
 *
 * Just to get rid of stupid colons
 */
function ncsulib_foundation_field($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . '&nbsp;</div>';
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
    if (isset($variables['link_path']) && $position_id != '2023' && $position_id != '2050') {
        if($staff_bio){
            $staff_url = $staff_bio_url;
        } else{
            $staff_url = '/staff/'.$author->name;
        }
            // We have a link path, so we should generate a link using l().
            $output  = '<div class="user-photo"><a href="'.$staff_url.'">'. $img .'</a></div>';
            $output .= '<div class="user-details">';
            $output .= '<span class="user-name"><a class="username" href="'.$staff_url.'">'.$variables['name'].'</a></span>'; //'. l($variables['name'] . $variables['extra'], $variables['link_path'], $variables['link_options']) .'</span>';
            $output .= '<span class="user-title">'. render($title) .'</span>';
            $output .= '</div>';
            $output  = '<div class="user-info">'. $output .'</div>';
    } else {
        // Modules may have added important attributes so they must be included
        // in the output. Additional classes may be added as array elements like

        $output  = '<div class="user-photo">'. $img .'</div>';
        $output .= '<div class="user-details">';
        $output .= '<span class="user-name username">'.$variables['name'].'</span>'; //'. l($variables['name'] . $variables['extra'], $variables['link_path'], $variables['link_options']) .'</span>';
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
  $output .= '<span class="user-name">' . $link . '</span>';
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

/** DEVICES **/

/**
 * Implements theme_field()
 *
 * Using this to change the markup delivered to the Field Request Form URL
 * field.  Turning it into a button.
 */
function ncsulib_foundation_field__field_request_form_url__device($variables) {
  $output ='';
  $device_nid = $variables['element']['#object']->nid;
  // default is Hill only
  $building = " (Hill only)";
  // NIDs that represent devices that can be lent anywhere
  $building_agnostic = array(23583, 23564, 22470, 23559, 28007);

  foreach ($variables['items'] as $delta => $item) {
    // Change value to "Hunt only" if it's a Hunt only lend device
    if ($device_nid == 24518 || $device_nid == 28035) {
      // 24518 = Google Glass
      $building = " (Hunt only)";
    } else if (in_array($device_nid, $building_agnostic)) {
      // 23583 = projectors
      $building = '';
    }
    $output = '<div class="clear-left"><a href="'.drupal_render($item).'" class="button">Request'.$building.'</a></div>';
  }
  return $output;
}

/** SPACES **/

/**
 * Implements theme_field()
 *
 * Using this to change the markup delivered to the Building field on Space
 * nodes
 */
function ncsulib_foundation_field__field_building_name__space($variables) {
  $output ='';
  foreach ($variables['items'] as $delta => $item) {
    $raw_lib_val = $variables['items'][0]['#markup'];
    if($raw_lib_val == 'James B. Hunt Jr. Library'){
      $lib = 'Hunt Library';
    } elseif ($raw_lib_val == 'D. H. Hill Library') {
      $lib = 'Hill Library';
    } else{
      $lib = $raw_lib_val;
    }

    $output = '<span class="building-name">'. $lib .'</span>';
  }
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
      $today        = date('m-d-Y');

      // Getting the phpScheduleIt id
      $room_res_id  = field_get_items('node', $node, 'field_room_res_id');
      $schedule_id_render_array  = field_view_value('node', $node, 'field_room_res_id', $room_res_id[0]);
      $schedule_id = $schedule_id_render_array['#markup'];

      // Check for exceptions on small-only button, issue discovered by Cory Lown
      $space_nid = $variables['element']['#object']->nid;
      $nodes_that_use_desktop_version = array(
        'Mini theater' => 1736,
        'Fishbowl' => 2092,
        'DML Studio' => 23924,
        'DML Workstations' => 24235
        );

      $mlib_option = '<a class="button show-for-small-only small" href="//m.lib.ncsu.edu/studyrooms/reserve.php?schedule='. $schedule_id .'">&rdsh; Reserve</a>';
      $mlib_option .= '<a class="button show-for-medium-up small" href="//www.lib.ncsu.edu/roomreservations/schedule.php?date='. $today .'&scheduleid='. $schedule_id .'">&rdsh; Reserve</a>';
      $desktop_only = '<a class="button" href="//www.lib.ncsu.edu/roomreservations/schedule.php?date='. $today .'&scheduleid='. $schedule_id .'">&rdsh; Reserve</a>';

      $output = in_array($space_nid, $nodes_that_use_desktop_version) ? $desktop_only : $mlib_option;
      break;

    case 'By Mediated Email Form':
      $request_form_url = field_get_items('node', $node, 'field_request_form_url');
      $form_url  = field_view_value('node', $node, 'field_request_form_url', $request_form_url[0]);
      $output = '<a class="button tiny" href="'. $form_url['#element']['url'] .'">&rdsh; Request this room</a>';
      break;

    case 'Not Reservable':
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
    $output .= '<span class="room-list">Room Numbers:&nbsp;</span>';
    $output .= '<ul class="room-numbers"' . $variables['content_attributes'] . '>';
    for ($i=0; $i < count($variables['items']); $i++) {
      $output .= '<li>'. drupal_render($variables['items'][$i]);
      $output .= ($i == count($variables['items'])-1) ? '</li>' : ', </li>';
    }
    $output .= '</ul>';
  } else {
    $output .= '<span class="room-list">Room Number:&nbsp;' . drupal_render($variables['items'][0]) . '</span>';
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
  $output .= '<div class="field-items"' . $variables['content_attributes'] . '>asdf';
  foreach ($variables['items'] as $delta => $item) {
    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}

/** EVENTS **/

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

  $output .= '<ul class="field-items"' . $variables['content_attributes'] . '>';
  // Render the items as a comma separated inline list
  foreach ($variables['items'] as $delta => $item) {
    $space_nid = $variables['element']['#items'][$delta]['entity']->nid;
    $space_node = node_load($space_nid);

    // Print space name
    $output .= '<li>' . drupal_render($item);

    // schema.org
      $b_nid = $space_node->field_building_new_['und'][0]['target_id'];
      $b_node = node_load($b_nid);
      $b_address = field_get_items('node', $b_node, 'field_address');
      // $b_address = $b_address[0]['value'];

      // $output .= '<div itemprop="location" itemscope itemtype="http://schema.org/Place" class="hide">';
      // $output .= '<div itemprop="name">'.$b_node->title.'</div>';
      // $output .= '<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';


      // $output .= '<div itemprop="name">'.$space_node->title.'</div>';
      // $output .= '<div itemprop="streetAddress">'.$b_address.'</div>';
      // $output .= '</div>';
      // $output .= '</div>';

      // // Load building info, if present, print it
      // $building_field = field_get_items('node', $space_node, 'field_building_name');
      // $building_yes = !empty($building_field);
      // if (!empty($building_field)) {
      //   $building_out = field_view_value('node', $space_node, 'field_building_name', $building_field[0]);
      //   $output .= ' at the '. drupal_render($building_out) .'</li>';
      // }

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
    $output .= '<span class="user-name">'. l(render($item), $item['link']) .'</span>';
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

/** PROJECT STORIES **/

/**
 * Implements theme_field()
 *
 * Turns field labels into heading3
 */
function ncsulib_foundation_field__project($variables) {
  // For lightweight label customization
  $field_name = $variables['element']['#field_name'];
  $field_label = $variables['label'];

  switch ($field_name) {
    case 'field_assessments':
      $field_label = "How it Went";
      break;

    case 'field_problem_statement':
      $field_label = "How it Got Started";
      break;

    case 'field_event_start':
      $field_label = "Event Date";
      break;

    case 'field_space':
      $field_label = "Library Spaces";
      break;

    case 'field_non_libraries_space':
      $field_label = "Other Spaces";
  }

  $output = '';

  // Render the label, if it's not hidden and display it as a heading 3
  if (!$variables['label_hidden']) {
    $output .= '<h2' . $variables['title_attributes'] . '>' . $field_label . '</h2>';
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

/**
 * Implements theme_field()
 *
 * Make collaborators show up with name, title and thumbnail image
 */
function ncsulib_foundation_field__field_staff__project($variables) {
  $output = '';

  // Render the label, if it's not hidden and display it as a heading 3
  if (!$variables['label_hidden']) {
    $output .= '<h2' . $variables['title_attributes'] . '>Collaborators</h2>';
  }

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
    $variables['items'][$key]['name'] = decode_entities(render($first_name));

    // Last Name
    $field = field_get_items('user', $collaborators[$key], 'field_lastname');
    $last_name = field_view_value('user', $collaborators[$key], 'field_lastname', $field[0]);
    $variables['items'][$key]['name'] .= " " . decode_entities(render($last_name));

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
 * Implements theme_field()
 *
 * Add paragraph tag wrapper to four-liner
 */
function ncsulib_foundation_field__field_four_liner__project($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
  foreach ($variables['items'] as $delta => $item) {
    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '><p>' . drupal_render($item) . '</p></div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}



/** HELPER FUNCTIONS **/

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
    if($position_id == '2050' || $position_id == '2023' || $position_id == '2024' || $position_id == '2353'){
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
        $output .= '<span class="user-name">'.$staff_url.'</span>';
        $output .= '<span class="user-title">'. render($item['title']) .'</span>';
        break;

      default:
        $output .= '<div class="user-photo">'. $img .'</div>';
        $output .= '<div class="user-details">';
        $output .= '<span class="user-name">'. $staff_url .'</span>';
        $output .= '<span class="user-title">'. render($item['title']) .'</span>';
        break;
    }
    $output .= '</div>';  // .user-details
    $output .= '</div>';  // .user-info
  }

  return $output;
}