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
    // Lines 19 to 118 are Jason Walsh's code (just so everyone knows Charlie would never write such code)
    if (module_exists('path')) {
        $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
        // If the alias is a clean URL
        if ($alias != $_GET['q'] || empty($variables['node'])) {
            // Break the alias into its parts and iterate through the alias part by part
            $i=0;
            foreach (explode('/', $alias) as $path_part) {
                if ($i==0) {
                    // If this is the first time through the loop, create the template suggestion
                    $template_suggestion = $path_part;
                    $css_suggestion = $path_part;
                } elseif ($i>=1) {
                    if ($i==1) {
                        // If this is the second time through the loop, create a variable to append each $path_part to
                        $path_part_holder = $css_suggestion . '--' . $path_part;
                    } elseif ($i>=2) {
                        $path_part_holder .= '--' . $path_part;
                    }

                    // If this is the second time or more through the loop, continue to append the alias path to the template suggestion
                    $template_suggestion = $template_suggestion . '__' . $path_part;
                    $css_suggestions[] = $path_part_holder;
                }

                // Increase the counter
                $i++;
            }

            $template_suggestion = 'page__' . $template_suggestion;
            // Add the template suggestion to the template suggestions hook
            $variables['theme_hook_suggestions'][] = $template_suggestion;
        }




    // Create the CSS suggestion(s)
    if (isset($css_suggestion)) {
      $css_suggestion = path_to_theme() .'/styles/'. $css_suggestion .'.css';
      // CSS suggestion for the top level alias path
      $include_style[] = $css_suggestion;
      // If the page resides at a deep level and more specific CSS is desired,
      // add more specific page CSS suggestions
      if (isset($css_suggestions)) {
        foreach ($css_suggestions as $suggestion) {
          $include_style[] = path_to_theme() .'/styles/'. $suggestion .'.css';
        }
      }
    }

    // If this is the front/home page of the site
    if ($variables['is_front']) {

      // Add the following Conditional CSS suggestions to Drupal
      drupal_add_css(path_to_theme() . '/styles/ie7.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
      drupal_add_css(path_to_theme() . '/styles/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));

      function ncsulibraries_css_alter(&$css) {
        // Remove unused CSS files for performance
        if (isset($css['modules/aggregator/aggregator.css'])) {
          unset($css['modules/aggregator/aggregator.css']);
        }
        if (isset($css['modules/book/book.css'])) {
          unset($css['modules/book/book.css']);
        }
        if (isset($css['modules/field/theme/field.css'])) {
          unset($css['modules/field/theme/field.css']);
        }
        if (isset($css['modules/node/node.css'])) {
          unset($css['modules/node/node.css']);
        }
        if (isset($css['modules/system/system.messages.css'])) {
          unset($css['modules/system/system.messages.css']);
        }
        if (isset($css['modules/user/user.css'])) {
          unset($css['modules/user/user.css']);
        }
        if (isset($css['sites/all/modules/ctools/css/ctools.css'])) {
          unset($css['sites/all/modules/ctools/css/ctools.css']);
        }
        if (isset($css['sites/all/modules/mollom/mollom.css'])) {
          unset($css['sites/all/modules/mollom/mollom.css']);
        }
        if (isset($css['sites/all/modules/views/css/views.css'])) {
          unset($css['sites/all/modules/views/css/views.css']);
        }
        if (isset($css['sites/all/modules/views_slideshow/views_slideshow.css'])) {
          unset($css['sites/all/modules/views_slideshow/views_slideshow.css']);
        }
      }
    }

    // If there are CSS suggestions to include
    if (isset($include_style)) {
      foreach ($include_style as $included_styles) {
        //Add the CSS suggestion to Drupal
        drupal_add_css($included_styles);
      }
    }
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

} // End tremendous template_preprocess_page function


/**
 * Implements hook_css_alter().
 */
function ncsulib_foundation_css_alter(&$css) {
  // Always remove base theme CSS.
  $theme_path = drupal_get_path('theme', 'zurb_foundation');

  foreach($css as $path => $values) {
    if(strpos($path, $theme_path) === 0) {
      unset($css[$path]);
    }
  }
}

/**
 * Implements hook_js_alter().
 */
function ncsulib_foundation_js_alter(&$js) {
  // Always remove base theme JS.
  $theme_path = drupal_get_path('theme', 'zurb_foundation');

  foreach($js as $path => $values) {
    if(strpos($path, $theme_path) === 0) {
      unset($js[$path]);
    }
  }
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
    // $breadcrumbs .= '<li class="current"><a href="#">' . $title. '</a></li>';
    $breadcrumbs .= '</ul>';

    return $breadcrumbs;
  }
}
