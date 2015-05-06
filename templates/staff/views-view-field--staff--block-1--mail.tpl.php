<?php
    $preferred_email = $row->field_field_email_address[0]['raw']['value'];
    $email = $row->users_mail;

    if($preferred_email){
        echo '<i class="fa fa-envelope"></i> <a href="mailto:'.$preferred_email.'">'.$preferred_email.'</a>';
    } else{
        echo '<i class="fa fa-envelope"></i> <a href="mailto:'.$email.'">'.$email.'</a>';
    }
?>