<?php

include 'controllers/spaces.php';
include 'controllers/events.php';
include 'controllers/news.php';
include 'controllers/users.php';
include 'controllers/library_stories.php';
include 'controllers/devices.php';


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
    $output .= '<h2 class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . '</h2>';
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
 * Turns all entity reference fields into a clean ul
 */
function ncsulib_foundation_field__entityreference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h2 class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . '</h2>';
  }

  // Render the items.
  $output .= '<ul class="field-items"' . $variables['content_attributes'] . '>';
  foreach ($variables['items'] as $delta => $item) {
    $classes = 'field-item ';
    $output .= '<li class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}



