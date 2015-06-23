<?php

/**
 * Setting custom variable htdocs root path
 */
variable_set('htdocs_root', str_replace(strrchr(DRUPAL_ROOT, "/"), "/htdocs", DRUPAL_ROOT));

/**
 *  Implements template_preprocess_page()
 *
 *  The code below handles additional page template/CSS suggestions in Drupal
 *  and other various and sundry activities
 */
function ncsulib_foundation_preprocess_page(&$variables) {

  // Add page--node_type.tpl.php suggestions
  if (!empty($variables['node'])) {
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
  }

  // Convenience variables
  if (!empty($variables['page']['sidebar_first'])){
    $left = $variables['page']['sidebar_first'];
  }

  if (!empty($variables['page']['sidebar_second'])) {
    $right = $variables['page']['sidebar_second'];
  }

  // Dynamic sidebars (this is critical)
  if (!empty($left) && !empty($right)) {
    $variables['main_grid'] = 'medium-6 push-3';
    $variables['sidebar_left'] = 'pull-6';
  } elseif (empty($left) && !empty($right)) {
    $variables['main_grid'] = 'medium-9';
    $variables['sidebar_left'] = '';
  } elseif (!empty($left) && empty($right)) {
    $variables['main_grid'] = 'medium-9 push-3';
    $variables['sidebar_left'] = 'pull-9';
  } else {
    $variables['main_grid'] = 'medium-12';
  }


  /**
   * End d.o Foundation code
   */

  // Begin CSS suggestions
  if (module_exists('path')) {
    $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
    // If the alias is a clean URL
    if ($alias != $_GET['q'] || empty($variables['node'])) {
      // Break the alias into its parts and iterate through the alias part by
      // part
      $i=0;
      foreach (explode('/', $alias) as $path_part) {
        if ($i==0) {
          // If this is the first time through the loop, create the template
          // suggestion
          $template_suggestion = $path_part;
          $css_suggestion = $path_part;
        } elseif ($i>=1) {
          if ($i==1) {
            // If this is the second time through the loop, create a variable
            // to append each $path_part to
            $path_part_holder = $css_suggestion . '--' . $path_part;
          } elseif ($i>=2) {
            $path_part_holder .= '--' . $path_part;
          }

          // If this is the second time or more through the loop, continue to
          // append the alias path to the template suggestion
          $template_suggestion = $template_suggestion . '__' . $path_part;
          $css_suggestions[] = $path_part_holder;
        }
        $i++;
      }

      $template_suggestion = 'page__' . $template_suggestion;
      // Add the template suggestion to the template suggestions hook
      $variables['theme_hook_suggestions'][] = $template_suggestion;
    }

    // Create the CSS suggestion(s)
    if (isset($css_suggestion)) {
      $css_suggestion = path_to_theme() .'/styles/core/custom/'. $css_suggestion .'.css';
      // CSS suggestion for the top level alias path
      $include_style[] = $css_suggestion;
      // If the page resides at a deep level and more specific CSS is desired,
      // add more specific page CSS suggestions
      if (isset($css_suggestions)) {
        foreach ($css_suggestions as $suggestion) {
          $include_style[] = path_to_theme() .'/styles/core/custom/'. $suggestion .'.css';
        }
      }
    }

    // If there are CSS suggestions to include
    if (isset($include_style)) {
      foreach ($include_style as $included_styles) {
        // Add the CSS suggestion to Drupal, add it after the 100 group which
        // contains the global theme-level css
        drupal_add_css($included_styles, array('group' => 101));
      }
    }
    // End CSS suggestions
  }


  // Creating a single template suggestion for all pages that begin with /scrc
  // allowing for overrides by more specific path-based or node id templates
  // e.g. page--scrc--zoologicalhealth.tpl.php or page--node--9999.tpl.php
  if (preg_match('/^scrc/', $alias)){
    $arr_length = count($variables['theme_hook_suggestions']);
    array_splice($variables['theme_hook_suggestions'], ($arr_length-2), 0, 'page__scrc__subpage');
  }

  // Add sidebard detector to the node object
  if(!empty($variables['page']['sidebar_first'])){
    $node_id = key($variables['page']['content']['system_main']['nodes']);
    $variables['page']['content']['system_main']['nodes'][$node_id]['#node']->sidebar_first = TRUE;
  }

  // Add custom JS/CSS
  $url_comp = explode('/', request_uri());

  // for entire directory (ex: /find)
  if (isset($url_comp[1])) {
    switch ($url_comp[1]) {
      case 'styleguide':
        drupal_add_js(path_to_theme() . '/scripts/styleguide.js', array('type' => 'file', 'group' => 101, 'weight' => 1));
        break;
      case 'videowalls':
        drupal_add_js(path_to_theme() . '/scripts/convert-to-zip.js', array('type' => 'file', 'group' => 101, 'weight' => 1));
        break;
      case 'zip-test':
        drupal_add_js(path_to_theme() . '/scripts/convert-to-zip.js', array('type' => 'file', 'group' => 101, 'weight' => 1));
        break;
      case 'news2':
        drupal_add_js(path_to_theme() . '/scripts/news.js', array('type' => 'file', 'group' => 101, 'weight' => 1));
        break;
    }

    if (isset($url_comp[1]) && isset($url_comp[2])) {
      // for two dirs deep (ex: find/books)
      switch ($url_comp[1] . '/' . $url_comp[2]) {
        case 'borrow/privileges':
          drupal_add_js(path_to_theme() . '/scripts/borrow-privileges.js', array('type' => 'file', 'group' => 101, 'weight' => 1));
          break;
      }
    }
  }

  // target a specific single page
  $url_comp = explode('/', request_path());
  $url_comp = implode('--', $url_comp);
  switch ($url_comp) {
    case 'techlending':
      drupal_add_js(path_to_theme() . '/scripts/vendor/foundation/foundation.equalizer.js', array('type' => 'file', 'group' => 101, 'weight' => 1));
      break;
    // case 'reservearoom':
      // drupal_add_js(path_to_theme() . '/scripts/reservearoom.js', array('type' => 'file', 'group' => 101, 'weight' => 1));
      // break;
    case 'huntlibrary--namingopportunities':
      drupal_add_css(path_to_theme() . '/styles/blitzer/jquery-ui-1.10.4.custom.min.css', 'file');
      drupal_add_js(path_to_theme() . '/scripts/vendor/jquery-ui-1.10.4.custom.min.js', 'file');
      drupal_add_js(path_to_theme() . '/scripts/vendor/jquery.imagemapster.min.js', 'file');
      drupal_add_js(path_to_theme() . '/scripts/namingopps.js', 'file');
      drupal_add_js(path_to_theme() . '/scripts/vendor/jquery.tablesorter.min.js', 'file');
      break;
  }


  // hide default 'no content' text for taxonomy terms
  if(isset($variables['page']['content']['system_main']['no_content'])) {
    unset($variables['page']['content']['system_main']['no_content']);
  }

  // overwrite 'user activity' taxonomy template page
  if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
    $term = taxonomy_term_load(arg(2));
    // $variables['theme_hook_suggestions'][] = 'page__taxonomy_' . $term->vocabulary_machine_name;

    // unset all content from user activity taxonomy page
    if($term->vocabulary_machine_name == 'user_activities' || $term->vocabulary_machine_name == 'services'){
      unset($variables['page']['content']['system_main']['nodes']);
      // unset($variables['page']['content']['system_main']['term_heading']['term']);
      unset($variables['page']['content']['system_main']['pager']);
    };
  }


} // End tremendous template_preprocess_page function


/**
 * Impelments template_preprocess_node()
 *
 */
function ncsulib_foundation_preprocess_node(&$variables) {
  switch ($variables['type']) {
    case 'space':
      drupal_add_css(path_to_theme() . '/styles/core/custom/space.css', array('group' => 101));
      break;

    case 'report':
      drupal_add_css(path_to_theme() . '/styles/core/custom/report.css', array('group' => 101));
      break;

    case 'project':
      drupal_add_css(path_to_theme() . '/styles/core/custom/projects.css', array('group' => 101));
      break;

  }
  // New tpl suggestion for short form stories
  // if ($variables['view_mode'] == 'full' && $variables['type'] == 'project' && $variables['field_story_type']['und'][0]['value'] == 0) {
  //   $variables['theme_hook_suggestions'][] = 'node__' . $variables['node']->type . '__short';
  //   $variables['theme_hook_suggestions'][] = 'node__' . $variables['node']->nid . '__short';
  // }

  // Make "node--NODETYPE--VIEWMODE.tpl.php" templates available for nodes
  if ($variables['view_mode'] == 'teaser') {
    $variables['theme_hook_suggestions'][] = 'node__' . $variables['node']->type . '__teaser';
    $variables['theme_hook_suggestions'][] = 'node__' . $variables['node']->nid . '__teaser';
  }

}


/**
 *  Blocks preprocessor
 *
 *  Handles adding additional classes to the blocks on the "/upcomingevents"
 *  page. Adds classes to blocks on the scrc page.
 */
function ncsulib_foundation_preprocess_block(&$variables) {
  if ($variables['block_html_id'] == 'block-views-upcoming-events-block-3') {
    $variables['classes_array'][] = 'medium-8';
    $variables['classes_array'][] = 'columns';
  }
  // adding classes to blocks on /scrc
  if ($variables['block_html_id']  == "block-aggregator-feed-8") {
    $variables['classes_array'][] = 'medium-8';
    $variables['classes_array'][] = 'columns';
  }
  if ($variables['block_html_id']  == "block-block-78"){
    $variables['classes_array'][] = 'medium-3';
    $variables['classes_array'][] = 'columns';
  }
  if ($variables['elements']['#block']->delta == "capture_and_promote-block_4") {
    drupal_add_css(path_to_theme() . '/styles/core/custom/capture_and_promote-block_4.css', array('group' => 101));
  }
}

/**
 * Implements hook_process_HOOK()
 *
 * Making our resource references (css and js) themeless
 */
function ncsulib_foundation_process_html(&$vars){
    foreach (array('head', 'styles', 'scripts', 'page_bottom') as $replace) {
        if (!isset($vars[$replace])) {
            continue;
        }

        $vars[$replace] = preg_replace('/(src|href|@import )(url\(|=)(")http(s?):/', '$1$2$3', $vars[$replace]);
    }
}

/**
 * Implements theme_menu_link()
 *
 * Adding Foundation 5 class for side navigation
 */
function ncsulib_foundation_menu_tree($variables) {
  return '<ul class="side-nav">' . $variables['tree'] . '</ul>';
}

/**
 * Implements hook_js_alter()
 */
function ncsulib_foundation_js_alter(&$javascript) {
  // Remove old jQuery
  unset($javascript['misc/jquery.js']);

  // Unset jQuery from the jQuery Update module
  unset($javascript['https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js']);
  unset($javascript['https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js']);
  unset($javascript['sites/all/modules/panels/js/panels.js']);
  unset($javascript[0]);
}


/**
 * Implements theme_breadrumb().
 *
 * Print breadcrumbs as a list, with separators.
 */
function ncsulib_foundation_breadcrumb($variables) {
  $links = array();
  $path = '';
  // Get URL arguments
  $arguments = explode('/', request_uri());
  // Remove empty values
  foreach ($arguments as $key => $value) {
    if (empty($value)) {
      unset($arguments[$key]);
    }
  }
  $arguments = array_values($arguments);
  // Add 'Home' link
  $links[] = l(t('Home'), '<front>');
  // Add other links
  if (!empty($arguments)) {
    foreach ($arguments as $key => $value) {
      // Don't make last breadcrumb a link
      if ($key == (count($arguments) - 1)) {
        $links[] = drupal_get_title();
      } else {
        if (!empty($path)) {
          $path .= '/'. $value;
        } else {
          $path .= $value;
        }
        $links[] = l(drupal_ucfirst($value), $path);
      }
    }
  }
  // Set custom breadcrumbs
  drupal_set_breadcrumb($links);
  // Get custom breadcrumbs
  $breadcrumb = drupal_get_breadcrumb();

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $breadcrumbs = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $breadcrumbs .= '<ul class="breadcrumbs">';

    foreach ($breadcrumb as $key => $value) {
      $breadcrumbs .= '<li>' . $value . '</li>';
    }

    $title = strip_tags(drupal_get_title());
    $breadcrumbs .= '</ul>';

    // only want breadcrumbs for /jobs right now
    $url_components = explode('/', request_uri());
    if($url_components[1] == 'jobs'){
      return $breadcrumbs;
    } else{
      return '';
    }
  }
}

/**
 * Implements hook_form_FORM_ID_alter()
 *
 */
function ncsulib_foundation_form_user_login_alter(&$form, &$form_state, $form_id) {
  // Alters the text on the user login form
  drupal_set_title(t('Website editing login'));
  $form['name']['#title'] = t('Enter your Unity ID:');
  $form['name']['#description'] = t('');  // Enter descriptive text here, if desired
  $form['pass']['#title'] = t('Enter your Unity password:');
  $form['pass']['#description'] = t('');  // Enter descriptive text here, if desired
}



/**
 * Do we still need this?
 *
 */
function ncsulib_foundation_more_link ($array) {
  if (stristr($array['url'], 'aggregator')) {
    return "";
  }
}

/**
 * Modify the output of views
 *
 */
function ncsulib_foundation_views_pre_render(&$view) {

    // add staff member name to page title
    if ($view->name == 'staff' && $view->current_display == 'page') {
       $first = $view->result[0]->_field_data['uid']['entity']->field_firstname['und'][0]['value'];
       $last = $view->result[0]->_field_data['uid']['entity']->field_lastname['und'][0]['value'];
       $view->build_info['title'] = $first.' '.$last;
    }

  // The following two loops add month and day formatted dates to events
  if ($view->name == 'upcoming_events' && $view->current_display == 'block_3') {
    if (!empty($view->result)) {
      for ($i = 0; $i < count($view->result); $i++ ) {
        // Set event url
        $node = node_load($view->result[$i]->nid);
        $url_data = field_get_items('node', $node, 'field_event_url');
        $alias = drupal_get_path_alias('node/'.$node->nid);
        if(!empty($url_data[0]['url'])) {
          $view->result[$i]->event_url = $url_data[0]['url'];
        } else if ($alias){
          $view->result[$i]->event_url = $alias;
        } else {
          $view->result[$i]->event_url = '/node/'.$view->result[$i]->nid;
        }

        // Set event dates
        $timestamp = filter_xss($view->result[$i]->field_data_field_time_field_time_value);
        $timestamp2 = filter_xss($view->result[$i]->field_data_field_time_field_time_value2);
        $open = strtotime($timestamp)+ncsulib_foundation_adjust_for_timezone($timestamp);
        $close = strtotime($timestamp2)+ncsulib_foundation_adjust_for_timezone($timestamp2);
        $view->result[$i]->date_display = (date('m j Y', $open) == date('m j Y', $close)) ? date('M j, Y', $open) : date('M j, Y', $open) . ' - ' . date('M j, Y', $close);
      }
    }
  }

  // Add stylesheet to make the related devices on tech categories look right
  if ($view->name == 'devices_device' && $view->current_display == 'block_9') {
    drupal_add_css(path_to_theme() . '/styles/related_devices.css');
  }

  // Add stylesheet to cover all dataviews block displays
  if ($view->name == "dv_hours_open") {
    drupal_add_css(path_to_theme() . '/styles/dataviews.css');
  }


}

/**
 * Helper function that adjusts date to current timezone. Especially for
 * daylight savings
 */
function ncsulib_foundation_adjust_for_timezone($time){
    $origin_dtz = new DateTimeZone(date_default_timezone_get());
    $origin_dt = new DateTime($time, $origin_dtz);
    return $origin_dtz->getOffset($origin_dt);
}

/* All fields theming funcitons */
include __DIR__ . '/fields.inc';



/* the nomarkup theme function */
function ncsulib_foundation_nomarkup($variables) {
  $output = '';
  // Render the items.
  foreach ($variables['items'] as $delta => $item) {
    $output .=  drupal_render($item);
  }
  return $output;
}