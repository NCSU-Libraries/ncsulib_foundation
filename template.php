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
      // Add the following CSS suggestions to Drupal
      drupal_add_css(path_to_theme() . '/styles/front-page.css');
      drupal_add_css(path_to_theme() . '/styles/search.css');
      drupal_add_css(path_to_theme() . '/styles/trln_ncsu_autosuggest.css');

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

  // Additional logic to unset the menus for the Reserve a Room page in Hunt
  if ($alias ==  'huntlibrary/reservearoom'){
    $variables['page']['sidebar_first'] = array();
  }

  // Creating a single template suggestion for all pages that begin with /scrc
  // allowing for overrides by more specific path-based or node id templates
  // e.g. page--scrc--zoologicalhealth.tpl.php or page--node--9999.tpl.php
  if (preg_match('/^1scrc/', $alias)){
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
 * Implements template_preprocess_node
 *
 */
//function ncsulib_foundation_preprocess_node(&$variables) {
//}

/**
 * Implements hook_preprocess_block()
 */
//function ncsulib_foundation_preprocess_block(&$variables) {
//  // Add wrapping div with global class to all block content sections.
//  $variables['content_attributes_array']['class'][] = 'block-content';
//
//  // Convenience variable for classes based on block ID
//  $block_id = $variables['block']->module . '-' . $variables['block']->delta;
//
//  // Add classes based on a specific block
//  switch ($block_id) {
//    // System Navigation block
//    case 'system-navigation':
//      // Custom class for entire block
//      $variables['classes_array'][] = 'system-nav';
//      // Custom class for block title
//      $variables['title_attributes_array']['class'][] = 'system-nav-title';
//      // Wrapping div with custom class for block content
//      $variables['content_attributes_array']['class'] = 'system-nav-content';
//      break;
//
//    // User Login block
//    case 'user-login':
//      // Hide title
//      $variables['title_attributes_array']['class'][] = 'element-invisible';
//      break;
//
//    // Example of adding Foundation classes
//    case 'block-foo': // Target the block ID
//      // Set grid column or mobile classes or anything else you want.
//      $variables['classes_array'][] = 'six columns';
//      break;
//  }
//
//  // Add template suggestions for blocks from specific modules.
//  switch($variables['elements']['#block']->module) {
//    case 'menu':
//      $variables['theme_hook_suggestions'][] = 'block__nav';
//    break;
//  }
//}

//function ncsulib_foundation_preprocess_views_view(&$variables) {
//}

/**
 * Implements template_preprocess_panels_pane().
 *
 */
//function ncsulib_foundation_preprocess_panels_pane(&$variables) {
//}

/**
 * Implements template_preprocess_views_views_fields().
 *
 */
//function ncsulib_foundation_preprocess_views_view_fields(&$variables) {
//}

/**
 * Implements theme_form_element_label()
 * Use foundation tooltips
 */
//function ncsulib_foundation_form_element_label($variables) {
//  if (!empty($variables['element']['#title'])) {
//    $variables['element']['#title'] = '<span class="secondary label">' . $variables['element']['#title'] . '</span>';
//  }
//  if (!empty($variables['element']['#description'])) {
//    $variables['element']['#description'] = ' <span data-tooltip="top" class="has-tip tip-top" data-width="250" title="' . $variables['element']['#description'] . '">' . t('More information?') . '</span>';
//  }
//  return theme_form_element_label($variables);
//}

/**
 * Implements hook_preprocess_button().
 */
//function ncsulib_foundation_preprocess_button(&$variables) {
//  $variables['element']['#attributes']['class'][] = 'button';
//  if (isset($variables['element']['#parents'][0]) && $variables['element']['#parents'][0] == 'submit') {
//    $variables['element']['#attributes']['class'][] = 'secondary';
//  }
//}

/**
 * Implements hook_form_alter()
 * Example of using foundation sexy buttons
 */
//function ncsulib_foundation_form_alter(&$form, &$form_state, $form_id) {
//  // Sexy submit buttons
//  if (!empty($form['actions']) && !empty($form['actions']['submit'])) {
//    $form['actions']['submit']['#attributes'] = array('class' => array('primary', 'button', 'radius'));
//  }
//}

// Sexy preview buttons
//function ncsulib_foundation_form_comment_form_alter(&$form, &$form_state) {
//  $form['actions']['preview']['#attributes']['class'][] = array('class' => array('secondary', 'button', 'radius'));
//}


/**
 * Implements template_preprocess_panels_pane().
 */
// function zurb_foundation_preprocess_panels_pane(&$variables) {
// }

/**
* Implements template_preprocess_views_views_fields().
*/
/* Delete me to enable
function THEMENAME_preprocess_views_view_fields(&$variables) {
 if ($variables['view']->name == 'nodequeue_1') {

   // Check if we have both an image and a summary
   if (isset($variables['fields']['field_image'])) {

     // If a combined field has been created, unset it and just show image
     if (isset($variables['fields']['nothing'])) {
       unset($variables['fields']['nothing']);
     }

   } elseif (isset($variables['fields']['title'])) {
     unset ($variables['fields']['title']);
   }

   // Always unset the separate summary if set
   if (isset($variables['fields']['field_summary'])) {
     unset($variables['fields']['field_summary']);
   }
 }
}

// */

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
