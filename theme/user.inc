<?php

/**
 * @file To handle the user theming/templating on pages that aren't the
 * user profile page
 */

/**
 * Helper function for printing a user blurb
 *
 * $uid is the User ID number, e.g. 21
 */
function get_user_info($uid) {
  $user = user_load($uid);

  $user_info = array();

  $image = field_get_items('user', $user, 'field_staff_photo');
  $user_info['image'] = field_view_value('user', $user, 'field_staff_photo', $image[0], array(
    'type' => 'image',
    'settings' => array(
      'image_style' => 'half-page-width',
      'image_link' => 'content',
    ),
  ));

  $delta = 0;
  $field = field_get_items('user', $user, 'field_firstname');
  $user_info['first_name'] = field_view_value('user', $user, 'field_firstname', $field[$delta]);

  $field = field_get_items('user', $user, 'field_lastname');
  $user_info['last_name'] = field_view_value('user', $user, 'field_lastname', $field[$delta]);

  $field = field_get_items('user', $user, 'field_title');
  $user_info['title'] = field_view_value('user', $user, 'field_title', $field[$delta]);

  return $user_info;
}

/**
 * Helper function for printing a user blurb
 *
 * $user_info is the array of values returned by get_user_info()
 */
function print_user_info($user_info) {
  // print user's photo thumbnail, user first and last name (linked), user title
  print '<div class="user-info">
          <div class="user-photo">
            ' . render($user_info['image']) . '
          </div>
          <div class="user-details">
            <span class="user-name">
              <a href="#">
                ' . render($user_info['first_name']) . ' ' . render($user_info['last_name']) . '</span>
              </a>
            <span class="user-title">
              ' . render($user_info['title']) . '
            </span>
          </div>
        </div>';
}