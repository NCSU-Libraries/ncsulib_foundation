<?php
/**
 * Featured Events page
 * Path: /events
 * Author: Erik Olson
 * Date: Sept 2015
 *
 * add building name
 */
    $space = $row->field_field_space[0]['rendered']['#markup'];
    $nid = $row->field_field_space[0]['raw']['entity']->field_building_new_['und'][0]['target_id'];
    $node = node_load($nid);
    if($node){
        $str = 'At the '.$space. ', '.$node->title;
    }

?>

<div class="columns medium-8 right">
    <small><?= $str ?></small>
</div>

