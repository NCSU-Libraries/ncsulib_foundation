<?php

    $lib = (request_uri() == '/do/make-at-hunt') ? 'hunt' : 'hill';

    if($lib == 'hill'){
        // get cal data from google APIs
        $cal_data_raw = file_get_contents("https://www.googleapis.com/calendar/v3/calendars/ncsu.edu_q3527do3hvduqkfvgg0o62b4bs@group.calendar.google.com/events?key=AIzaSyB91IUoo5_R9y4ASIiyfBHlR8mbuPRhbuU&timeMin=".date('c'));
        $cal_json = json_decode($cal_data_raw);
        $cal_items = $cal_json->items;
    }

    function findTime($cal_items, $maker_day){
        foreach($cal_items as $item){
            $summary = $item->summary;
            $cal_day = date('z',strtotime($item->start->dateTime));
            if($cal_day == $maker_day){
                $start_time = date('g',strtotime($item->start->dateTime));
                $end_min = date('i',strtotime($item->end->dateTime));
                if($end_min > 0){
                    $end_time = date('g',strtotime($item->end->dateTime)+(60*60));
                } else{
                    $end_time = date('g',strtotime($item->end->dateTime));
                }

                preg_match('/(.*?closed.*?)/i',$summary,$closed);
                preg_match('/(.*?limited\savailability.*?)/i',$summary,$limited);
                if(!empty($limited)){
                    return 'limited availability '.$start_time . '-' . $end_time.'*';
                }
                if(!empty($closed)){
                    return 'closed '.$start_time . '-' . $end_time.'*';
                }
            }
        }
    }
?>
<section class="block block-block contextual-links-region">
    <?php
        $mkr_ary = hours_get_day_range($lib,'makerspace',5);
        echo '<h2>Hours</h2>';
        echo '<table>';
        foreach($mkr_ary as $key => $hours){
            $note = findTime($cal_items, date('z',strtotime($hours->hours->value)));
            echo '<tr>';
            echo '<td>'.$hours->date_display.'</td>';
            echo '<td>'.$hours->display.'<br/><small>'.$note.'</small></td>';
            echo '</tr>';
        }
        echo '</table>';
    ?>
    <?php if($lib == 'hill'){ ?>
    <?php if(!empty($cal_items)){ ?>
    <p><small>*Closed or limited access due to workshops</small></p>
    <?php } ?>
    <p><a href="/makerspace-calendar">Makerspace calendar <i class="fa fa-chevron-right"></i></a></p>
    <?php } ?>
    <p><a href="/hours/<?= $lib ?>/makerspace">Full Makerspace hours <i class="fa fa-chevron-right"></i></a></p>
</section>