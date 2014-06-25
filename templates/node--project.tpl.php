<?php

// First, getting the data we need to print author and associated staff
$author = get_user_info($uid);

$associated_staff_uids = array();
foreach ($content['field_staff']['#items'] as $user) {
  $associated_staff_uids[] = $user['target_id'];
}
$associated_staff = array();
foreach ($associated_staff_uids as $staff_member) {
  $associated_staff[] = get_user_info($staff_member);
}

// Since we won't be using this directly
hide($content['field_staff']);

?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

    <div class="story">

      <div class="intro">

        <div class="story-title">
          <?php if ($title): ?>
          <?php print render($title_prefix); ?>
          <h1 id="page-title" class="title"><?php print $title; ?></h1>
            <?php print render($title_suffix); ?>
          <?php endif; ?>

          <?php print render($title_prefix); ?>
          <?php if (!$page): ?>
            <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
        </div>
        <?php print render($content['field_problem_statement']); ?>
        <?php print render($content['field_featured_image']); ?>

      </div>

      <div class="story-body">

          <div class="story-statement">
            <?php print render($content['body']); ?>
            <?php print render($content['field_assessments']); ?>
          </div>
          <aside class="story-statement-aside">
            <h2>About the Author</h2>

            <?php print_user_info($author); ?>

            <h2>Collaborators</h2>

            <?php
              foreach ($associated_staff as $collaborator) {
                print_user_info($collaborator);
              }
            ?>

            <?php print render($content); ?>

          </aside>
        </div>

      </div>

    </div>

</article>