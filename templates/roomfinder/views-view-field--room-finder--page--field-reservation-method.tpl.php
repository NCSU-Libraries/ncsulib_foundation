<?php
  if (!empty($output)){
      switch ($output) {
          case 'By Mediated Email Form':
          // Print out the url depending on whether or not there is a value
          // set for the field_request_form_url
          $reservation_url = isset($row->field_field_request_form_url) ? $row->field_field_request_form_url[0]['raw']['url'] :  '/huntlibrary/roomrequest';
          print '<a class="button tiny right" href="' . $reservation_url . '">Request a reservation</a>';
          break;

        case 'By Room Reservation System':
          $today = date('m-d-Y');

          // Check for exceptions on small-only button
          $space_nid = $row->nid;
          $nodes_that_use_desktop_version = array(
            'Mini theater' => 1736,
            'Fishbowl' => 2092,
            'DML Studio' => 23924,
            'DML Workstations' => 24235
            );
          $schedule_id = $row->_field_data['nid']['entity']->field_room_res_id['und'][0]['value'];

          $mlib_option = '<a class="button show-for-small-only tiny" href="//m.lib.ncsu.edu/studyrooms/reserve.php?schedule='. $schedule_id .'">Reserve</a>';
          $mlib_option .= '<a class="button show-for-medium-up tiny" href="//www.lib.ncsu.edu/roomreservations/schedule.php?date='. $today .'&scheduleid='. $schedule_id .'">Reserve</a>';
          $desktop_only = '<a class="button tiny" href="//www.lib.ncsu.edu/roomreservations/schedule.php?date='. $today .'&scheduleid='. $schedule_id .'">Reserve</a>';

          $output = in_array($space_nid, $nodes_that_use_desktop_version) ? $desktop_only : $mlib_option;
          print $output;
          break;
      }
    }
