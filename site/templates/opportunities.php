<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<?php snippet('header') ?>

<main>

  <!-- section name -->
  <div class="opportunities-title">
    <h1><?= $page->title() ?></h1>
  </div>

  <div class="opportunities">

    <!-- each article-->
    <?php foreach ($articles->sortBy('date', 'desc')->limit(12) as $article): ?>

      <!-- image section -->
      <?php if ($image = $article->image()): ?>
        <div class="opportunity">
          <div class="post-image">
            <a href="<?= $article->url() ?>">
              <!-- grab first image in project folder (alphabetically) -->
              <img src="<?= $image->crop(960)->url() ?>" alt="<?= $article->alt() ?>">
            </a>
          </div>
          <!-- text section -->
          <div class="post">
            <!-- post title -->
            <a href="<?= $article->url() ?>">
              <h2><?= $article->Title() ?></h2>
            </a>
            <!-- list individual post tags -->
            <!-- https://forum.getkirby.com/t/list-tags-for-a-page/31301 -->
            <?php $post_tags = $article->tags()->split() ?>
            <?php foreach ($post_tags as $post_tag): ?>
              <a class="category" href="<?= url('opportunities', ['params' => ['tag' => $post_tag]]) ?>">
                <?= $post_tag ?>
              </a>
            <?php endforeach ?>

            <!-- Display posted date -->
            <div class="posted-date">
              Posted <?= $article->date()->toDate('F j, Y') ?>
            </div>
            <!-- Display short description -->
            <p class="description"><?= $article->short_description()->kirbytext() ?></p>
            <!-- Read More Button -->
            <a href="<?= $article->url() ?>" class="button">
              View Post
            </a>

          </div>
        </div>
      <?php endif ?>
    <?php endforeach ?>
  </div>


  <!-- pagination (untested) -->
  <nav class="pagination">
    <?php if ($pagination->hasPrevPage()): ?>
      <a href="<?= $pagination->prevPageUrl() ?>">Previous Posts</a>
    <?php endif ?>

    <?php if ($pagination->hasNextPage()): ?>
      <a href="<?= $pagination->nextPageUrl() ?>">More Posts</a>
    <?php endif ?>
  </nav>

  <!-- Submit an opportunity promo -->
  <div class="promo">📣 <a href="https://docs.google.com/forms/d/e/1FAIpQLSczR9Ct3qaWETS72DoIO03LlLTeIWF8sSQxMvnTNwfs0aXAHA/viewform">Got an Opportunity? Post It!</a> 🦄</div>

</main>

<!-- bottom section -->
<?php snippet('footer') ?>