<?php
  if (!empty($output)){
      switch ($output) {
          case 'By Mediated Email Form':
          // Print out the url depending on whether or not there is a value
          // set for the field_request_form_url
          $reservation_url = isset($row->field_field_request_form_url) ? $row->field_field_request_form_url[0]['raw']['url'] :  '/huntlibrary/roomrequest';
          print '<a class="button" href="' . $reservation_url . '">Request a reservation</a>';
          break;

        case 'By Room Reservation System':
          $today = date('m-d-Y');
          print '<a class="button" href="http://www.lib.ncsu.edu/roomreservations/schedule.php?date='.$today.'&scheduleid='.$row->_field_data['nid']['entity']->field_room_res_id['und'][0]['value'].'">Reserve</a>';
          break;
      }
    }
