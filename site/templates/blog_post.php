<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main>
  <br><br>
  <section class="content article">
    <article>

      <?php if ($image = $page->image()): ?>
        <!-- TODO: What div should go around this image? -->
        <img
          src="<?= $image->crop(960)->url() ?>"
          alt="<?= $page->alt()->value() ?>"
          width="960px">
      <?php endif ?>

      <h2><?= $page->title()->html() ?></h2>
      <p></p>
      <!-- Display post tags -->
      <?php $post_tags = $page->tags()->split() ?>
      <?php foreach ($post_tags as $post_tag): ?>
        <a class="tag" href="<?= url('blog', ['params' => ['tag' => $post_tag]]) ?>">
          <?= $post_tag ?>
        </a>
      <?php endforeach ?>

      <?= $page->text()->kirbytext() ?>

      <a href="<?= url('blog') ?>">Back…</a>

    </article>
  </section>

</main>

<!-- bottom section -->
<?php snippet('footer') ?>