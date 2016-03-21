    <h1 id="page-title" class="title" itemprop="headline"><?php print $title; ?></h1>
    <div id="feature-photo" class="row">
        <div class="columns medium-12">
            <?= render($content['field_news_feature_photo']); ?>
        </div>
    </div>
    <div itemprop="articleBody">
        <?= render($content); ?>
    </div>