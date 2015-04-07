<!-- get contents of course guides field -->
<?php

    $userID = arg(1);
    $html = file_get_contents('http://webdev.lib.ncsu.edu/recommended/contacts.json');
    $data = json_decode($html);
    $user_data = $data->$userID->courses;
    if(count($user_data)){
        echo '<h3>'.$block->title.'</h3>';
        foreach($user_data as $key=>$course){
        echo '<p>';
            if($course[0] == 0){
                echo '<a href="/course/'.strtoupper($key).'"><strong>'.strtoupper($key) . '</strong></a> ';
            } else{
                echo '<strong>' . strtoupper($key) . '</strong> ';
            }
            foreach($course as $key2=>$c){
                if($c != 0){
                    echo '<a href="/course/'.strtoupper($key).'/'.$c.'">'.$c.'</a> ';
                }
            }
        echo '</p>';
        }
    }


?>