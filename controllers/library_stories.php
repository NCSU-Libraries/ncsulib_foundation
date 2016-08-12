<?php
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
     * Make story lead(s) show up with name, title and thumbnail image
     */
    function ncsulib_foundation_field__field_project_user_activities__project($variables) {
      $output = '';

      // Load all items
      foreach ($variables['element']['#items'] as $key => $value) {
        $output .= '<a href="/taxonomy/term/'.$value['tid'].'" class="term">'.$value['taxonomy_term']->name.'</a>, ';
      }
      $output = substr($output, 0, -2);
      return $output;
    }



    /**
     * Implements theme_field()
     *
     * Make story lead(s) show up with name, title and thumbnail image
     */
    function ncsulib_foundation_field__field_story_lead__project($variables) {
      $output = '';

      // Render the label, if it's not hidden and display it as a heading 3
      if (!$variables['label_hidden']) {
        $output .= '<h2' . $variables['title_attributes'] . '>Story Lead</h2>';
      }

      // Load all collaborators' fields
      $story_leads = array();
      foreach ($variables['element']['#items'] as $key => $value) {
        $story_leads[] = user_load($value['target_id']);

        // Account status
        $status = $story_leads[$key]->status;
        $variables['items'][$key]['status'] = $status;

        // First name
        $field = field_get_items('user', $story_leads[$key], 'field_firstname');
        $first_name = field_view_value('user', $story_leads[$key], 'field_firstname', $field[0]);
        $variables['items'][$key]['name'] = decode_entities(render($first_name));

        // Last Name
        $field = field_get_items('user', $story_leads[$key], 'field_lastname');
        $last_name = field_view_value('user', $story_leads[$key], 'field_lastname', $field[0]);
        $variables['items'][$key]['name'] .= " " . decode_entities(render($last_name));

        // Link to user's page
        $variables['items'][$key]['link'] = 'staff/'. $story_leads[$key]->name;

        // Image
        $variables['items'][$key]['image'] = get_user_image($story_leads[$key]);

        // Title
        $field = field_get_items('user', $story_leads[$key], 'field_title');
        $variables['items'][$key]['title'] = field_view_value('user', $story_leads[$key], 'field_title', $field[0]);

        // Position
        $field = field_get_items('user', $story_leads[$key], 'field_staff_position');
        $variables['items'][$key]['position'] = field_view_value('user', $story_leads[$key], 'field_staff_position', $field[0]);

      }
      return print_multiple_users($variables['items'], $output);
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

    /**
     * Implements theme_field()
     *
     * turn projects photos into carousel
     */
    function ncsulib_foundation_field__field_photos__projects($variables) {
      $output = '';

      if(count($variables['items']) == 1){
        $entity_ary = $variables['items'][0]['entity']['field_collection_item'];
        $entity_ref = array_shift(array_slice($entity_ary, 0, 1));
        $caption = $entity_ref['#entity']->field_caption_projects['und'][0]['safe_value'];
        $file = $entity_ref['#entity']->field_photo_collection['und'][0]['uri'];
        $img_url = image_style_url('large', $file);

        $output .=   '<img src="'.$img_url.'" alt="'.$caption.'" width="100%" />';
      } else{
        $output = '<ul class="projects-carousel unstyle-list" data-orbit data-options="animation:fade;bullets:false;timer:false;slide_number:false;">';

        foreach($variables['items'] as $key => $p){
          $entity_ref_ary = $p['entity']['field_collection_item'];
          $entity_ref = array_shift(array_slice($entity_ref_ary, 0, 1));
          $caption = $entity_ref['#entity']->field_caption_projects['und'][0]['safe_value'];
          $file = $entity_ref['#entity']->field_photo_collection['und'][0]['uri'];
          $img_url = image_style_url('large', $file);

          $output .= '<li data-orbit-slide="slide-'.($key+1).'">';
          $output .=   '<img src="'.$img_url.'" alt="'.$caption.'" width="100%" />';
          $output .=   '<div class="orbit-caption">';
          $output .=   $caption;
          $output .=   '</div>';
          $output .= '</li>';
        }

        $output .= '</ul>';


      // print out thumbs
        $output .= '<div id="carousel-thumbs">';
        foreach($variables['items'] as $key => $p){
          $entity_ref_ary = $p['entity']['field_collection_item'];
          $entity_ref = array_shift(array_slice($entity_ref_ary, 0, 1));
          $caption = $entity_ref['#entity']->field_caption_projects['und'][0]['safe_value'];
          $file = $entity_ref['#entity']->field_photo_collection['und'][0]['uri'];
          $img_url = image_style_url('thumbnail', $file);

          $output .= '<a data-orbit-link="slide-'.($key+1).'" class="thumb">';
          $output .= '<img src="'.$img_url.'" />';
          $output .= '</a>';
        }
        $output .= '</div>';
      }

      return $output;
    }
?>
