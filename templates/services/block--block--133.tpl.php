<section class="block block-block contextual-links-region">
    <?php
        $mkr_ary = hours_get_day_range('hunt','makerspace',5);

        echo '<h2>Hours</h2>';
        echo '<table>';
        foreach($mkr_ary as $key => $hours){
            echo '<tr>';
            echo '<td>'.$hours->date_display.'</td>';
            echo '<td>'.$hours->display.'</td>';
            echo '</tr>';
        }
        echo '</table>';
    ?>
    <p><a href="/hours/hunt/makerspace">Full hours and exceptions</a></p>
</section>