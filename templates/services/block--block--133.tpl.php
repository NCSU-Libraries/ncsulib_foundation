<section class="block block-block contextual-links-region">
<?php

 $mkr_ary = hours_get_reg_schedule('hunt','makerspace');
foreach($mkr_ary as $key => $hours){
    echo '<h2>'.ucfirst(key($mkr_ary)) . ' Hours</h2>';
    echo '<table>';
    foreach($hours as $hour){
        echo '<tr>';
        echo '<td>'.$hour['day_range'].'</td>';
        echo '<td>'.$hour['open_hours'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>
</section>