<!-- nav section -->
<?php snippet('navigation') ?>

<!-- top section -->
<?php snippet('header') ?>


<!-- content section -->
<main>

<section class="blog">

  <h1><?= $page->title()->html() ?></h1>

  <?php foreach($page->children()->listed()->flip() as $article): ?>

    <article>

      <?php if($image = $article->image()): ?>
          <div class="post-image">
              <a href="<?= $article->url() ?>">
                  <!-- grab first image in project folder (alphabetically) -->
                  <img src="<?= $image->crop(468)->url() ?>" alt="<?= $article->alt() ?>">
              </a>
          </div>
      <?php endif ?>

      <h1><?= $article->title()->html() ?></h1>
      <p><?= $article->text()->excerpt(300) ?></p>
      <a href="<?= $article->url() ?>">Read more…</a>
      <!-- list all tags associated with this post -->
      <h1>Tags:</h1>
      <ul>
        <?php $tags = $article->tags()->split() ?>
          <?php foreach ($tags as $tag): ?>
            <li><?=  $tag ?></li>
          <?php endforeach ?>
      </ul>

    </article>

  <?php endforeach ?>

</section>

</main>

<!-- bottom section -->
<?php snippet('footer') ?>