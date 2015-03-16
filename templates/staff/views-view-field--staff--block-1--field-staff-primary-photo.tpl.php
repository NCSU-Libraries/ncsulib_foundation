<?php
    $uri = $row->field_field_staff_primary_photo[0]['raw']['uri'];
    $img_url = image_style_url('half-page-width', $uri);
    $first =  $row->_field_data['uid']['entity']->field_firstname['und'][0]['value'];
    $last =  $row->_field_data['uid']['entity']->field_lastname['und'][0]['value'];
    echo '<img src="'.$img_url.'" width="100%" alt="NC State Library Staff member: '.$first.' '.$last.'" />';
    // kpr($row);

?>