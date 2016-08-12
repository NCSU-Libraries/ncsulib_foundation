<?php
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

?>
