<?php


    $lib = (request_uri() == '/do/make-at-hunt') ? 'hunt' : 'hill';

    function getLib(){
        $lib = (request_uri() == '/do/make-at-hunt') ? 'hunt' : 'hill';

        return $lib;
    }

    function getDaysEvents($day){
        if(getLib() != 'hill'){
            return;
        }
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

                array_push($day_ary, 'lmtd availability '.$begin . '-' . $end.'*');
            }
            if(!empty($closed)){
                $begin = getBeginTimeString($item->start->dateTime);
                $end = getEndTimeString($item->end->dateTime);
                // if($begin != $end){
                    array_push($day_ary, 'closed '.$begin . '-' . $end.'*');
                // }
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
            if($display != 'closed'){
                foreach($note as $item){
                    echo '<small>'.$item.'</small><br>';
                }
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