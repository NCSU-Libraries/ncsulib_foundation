<?php
    $url = $row->field_field_request_a_consultation[0]['raw']['url'];
    $title = $row->field_field_request_a_consultation[0]['raw']['title'];
    $test = strstr($url, '@');
    if($test){
        $url = 'mailto:'.$url;
    }
    if($title):
?>

    <p><a class="styled" href="<?= $url ?>"><?= $title ?></a></p>

    <?php endif; ?>
