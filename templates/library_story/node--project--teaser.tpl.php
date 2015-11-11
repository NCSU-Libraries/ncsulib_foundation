<?php
  // Getting the URL of the image used for the backgrounds
    $uri = $content['field_featured_image_landscape']['#items'][0]['uri'];
    $path = image_style_url('large', $uri);
?>

<div class="project-photo">
    <a href="<?= $node_url ?>"><img src="<?= $path ?>" alt="<?= $title ?>"></a>
    <p class="date"><?php print date('F j, Y', $created); ?></p>
    <?php if(isset($content['field_project_user_activities'])): ?>
        <h3>Topics covered</h3>
        <?php print render($content['field_project_user_activities']); ?>
    <?php endif; ?>
</div>

<div class="project-content">
    <div class="centering-container">
        <div class="title-container">
            <a href="<?php print $node_url; ?>" class="project-title" >
                <h2><?php print $title; ?></h2>
                <?php print render($content['field_four_liner']); ?>
            </a>
        </div>
    </div>



    <div class="project-details">
        <div class="project-author">
            <?php print render($content['field_story_lead']); ?>
        </div>
<!--         <div class="project-meta">
            <a href="<?php print $node_url; ?>" class="read-more">Read more &rarr;</a>
        </div> -->
    </div>
</div>
