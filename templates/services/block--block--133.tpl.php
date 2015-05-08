<section class="block block-block contextual-links-region">
<?php

 $mkr_ary = hours_get_reg_schedule('hunt','makerspace');
foreach($mkr_ary as $key => $hours){
    echo '<h2>'.key($mkr_ary) . ' Hours</h2>';
    // kpr($key);
    // echo '<h2>Hours</h2>';
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
    <p><a href="/hours/hunt/makerspace">Full hours and exceptions</a></p>
</section>