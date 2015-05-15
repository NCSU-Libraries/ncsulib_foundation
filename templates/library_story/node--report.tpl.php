<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="report">
        <div class="report-title">
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
          <?php print render($content['body']); ?>
        </div>


      <div class="report-body">

          <div class="report-statement">
            <?php print render($content['field_problem_statement']); ?>
            <?php print render($content['field_technical_details']); ?>

            <div class="report-team">
              <h2>Team</h2>
              <?php print render($content['field_staff']); ?>
            </div>

            <?php print render($content['field_pubs_and_presos']); ?>

          </div>
          <aside class="report-statement-aside sidebar">

            <?php print render($content['field_featured_image']); ?>
            <?php print render($content['field_contact']); ?>
            <?php print render($content['field_primary_link']); ?>
            <?php print render($content['field_repo_or_license']); ?>
            <?php print render($content['field_links']); ?>
            <?php print render($content['field_awards']); ?>
            <p class="date-posted">Last updated on <?php print date('F j, Y', $created); ?></p>

          </aside>
        </div>

      </div>

    </div>

</article>
