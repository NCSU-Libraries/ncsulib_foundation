<?php

    $lib = (request_uri() == '/do/make-at-hunt') ? 'hunt' : 'hill';

    if($lib == 'hill'){
        // get cal data from google APIs
        // $cal_data_raw = file_get_contents("https://www.googleapis.com/calendar/v3/calendars/ncsu.edu_q3527do3hvduqkfvgg0o62b4bs@group.calendar.google.com/events?key=AIzaSyB91IUoo5_R9y4ASIiyfBHlR8mbuPRhbuU&timeMin=".date('c'));
        $cal_data_raw = file_get_contents('https://www.googleapis.com/calendar/v3/calendars/ncsu.edu_q3527do3hvduqkfvgg0o62b4bs@group.calendar.google.com/events?key=AIzaSyB91IUoo5_R9y4ASIiyfBHlR8mbuPRhbuU&timeMin='.date('c').'&orderBy=starttime&singleEvents=true&timeMax='.date('c', strtotime("+5 days")));
        $cal_json = json_decode($cal_data_raw);
        $cal_items = $cal_json->items;
    }

    function getDaysEvents($day){
        $start = date('Y-m-d',$day) . 'T00:00:00-04:00';
        $end = date('Y-m-d', $day + 86400) . 'T00:00:00-04:00';
        $url = 'https://www.googleapis.com/calendar/v3/calendars/ncsu.edu_q3527do3hvduqkfvgg0o62b4bs@group.calendar.google.com/events?key=AIzaSyB91IUoo5_R9y4ASIiyfBHlR8mbuPRhbuU&timeMin='.$start.'&orderBy=starttime&singleEvents=true&timeMax='.$end;

        $cal_data_raw = file_get_contents($url);
        $cal_json = json_decode($cal_data_raw);
        $cal_items = $cal_json->items;

        // loop of events by day
        $day_ary = array();
        $str = '';
        $c=0;
        foreach($cal_items as $item){
            $c++;
            $summary = $item->summary;

            // is it closed or limited availability
            preg_match('/(.*?closed.*?)/i',$summary,$closed);
            preg_match('/(.*?limited\savailability.*?)/i',$summary,$limited);
            if(!empty($limited)){
                $begin = getBeginTimeString($item->start->dateTime);
                $end = getEndTimeString($item->end->dateTime);
                // // get prev item
                // $prev_begin = getTimeString($cal_items[$c-2]->start->dateTime);
                // $prev_end = getTimeString($cal_items[$c-2]->end->dateTime);
                // // get next item
                // $next_begin = getTimeString($cal_items[$c+1]->start->dateTime);
                // $next_end = getTimeString($cal_items[$c+1]->end->dateTime);

                // if($begin != $prev_end){
                //     $str = 'lmt availability '.$begin.'-';
                // } else if($begin == $prev_end){
                //     $str .= $end;
                // }

                array_push($day_ary, 'lmtd availability '.$begin . '-' . $end.'*');
            }
            if(!empty($closed)){
                $begin = getBeginTimeString($item->start->dateTime);
                $end = getEndTimeString($item->end->dateTime);
                // // get prev item
                // $prev_begin = getTimeString($cal_items[$c-2]->start->dateTime);
                // $prev_end = getTimeString($cal_items[$c-2]->end->dateTime);
                // // get next item
                // $next_begin = getTimeString($cal_items[$c+1]->start->dateTime);
                // $next_end = getTimeString($cal_items[$c+1]->end->dateTime);

                // if($begin != $prev_end){
                //     $str = 'closed '.$begin.'-';
                // } else if($begin == $prev_end){
                //     $str .= $end;
                // }

                array_push($day_ary, 'closed '.$begin . '-' . $end.'*');
            }
        }

        // return $str;
        return $day_ary;
    }

    function getBeginTimeString($time){

        $t = date('g',strtotime($time));

        return $t;
    }

    function getEndTimeString($time){

        $t = date('g',strtotime($time));
        $min = date('i',strtotime($time));
        if($min > 0){
            $t = date('g',strtotime($time)+(60*60));
        } else{
            $t = date('g',strtotime($time));
        }

        return $t;
    }


    // function findTime($cal_items, $maker_day){
    //     foreach($cal_items as $item){
    //         $summary = $item->summary;
    //         $cal_day = date('z',strtotime($item->start->dateTime));
    //         if($cal_day == $maker_day){
    //             $start_time = date('g',strtotime($item->start->dateTime));
    //             $end_min = date('i',strtotime($item->end->dateTime));
    //             if($end_min > 0){
    //                 $end_time = date('g',strtotime($item->end->dateTime)+(60*60));
    //             } else{
    //                 $end_time = date('g',strtotime($item->end->dateTime));
    //             }

    //             preg_match('/(.*?closed.*?)/i',$summary,$closed);
    //             preg_match('/(.*?limited\savailability.*?)/i',$summary,$limited);
    //             if(!empty($limited)){
    //                 return 'limited availability '.$start_time . '-' . $end_time.'*';
    //             }
    //             if(!empty($closed)){
    //                 return 'closed '.$start_time . '-' . $end_time.'*';
    //             }
    //         }
    //     }
    // }
?>
<section class="block block-block contextual-links-region">
    <?php
        $mkr_ary = hours_get_day_range($lib,'makerspace',5);
        echo '<h2>Hours</h2>';
        echo '<table>';
        foreach($mkr_ary as $key => $hours){
            $note = getDaysEvents(strtotime($hours->hours->value));
            $display = str_replace(':00', '', $hours->display);
            echo '<tr>';
            echo '<td width="32%">'.$hours->date_display.'</td>';
            echo '<td>'.$display.'<br/>';
            foreach($note as $item){
                echo '<small>'.$item.'</small><br>';
            }
            // echo '<small>'.$note.'</small><br>';
            echo '</td>';
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