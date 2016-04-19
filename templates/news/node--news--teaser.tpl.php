<style>
    .item{
        margin-bottom: 40px;
        width: 100%;
    }
    .photo img{
        width: 100%;
    }
    .teaser{
        width: 100%;
    }
    .submitted{
        display: none;
    }
    .links{

    }
    .node-readmore .element-invisible{
        display: none;
    }
</style>
<?php
    $data = json_encode($content);
    $json = json_decode($data);

    $object = $json->body->{'#object'};
    $title = $object->title;
    $photo = render($content['field_news_feature_photo']);
    $body = $object->body->und[0]->value;
    $summary = $object->body->und[0]->summary;
    $nid = $object->nid;
    $url = 'https://www.lib.ncsu.edu/node/'.$nid;
?>


<div class="item">
    <h1><a href="<?= $url ?>"><?= $title; ?></a></h1>
    <div class="photo"><a href="<?= $url ?>"><?= $photo; ?></a></div>
    <div class="teaser"><p><?= $summary; ?></p></div>
    <p><a href="<?= $url ?>">Read more</a></p>
</div>
