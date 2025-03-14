<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main>
  <br><br>
  <!-- grab the first/only image in the folder -->
  <?php if ($image = $page->image()): ?>
    <!-- TODO: What div should go around this image? -->
    <img class="post-image"
      src="<?= $image->crop(960, 960)->url() ?>"
      alt="<?= $page->alt()->value() ?>"
      width="960px">
  <?php endif ?>

  <?php if ($page->title()->isNotEmpty()): ?>
    <h2>
      <?= $page->title()->html() ?>
    </h2>
  <?php endif ?>

  <!-- Display post tags -->
  <?php $post_tags = $page->tags()->split() ?>
  <?php foreach ($post_tags as $post_tag): ?>
    <a class="tag" href="<?= url('blog', ['params' => ['tag' => $post_tag]]) ?>">
      <?= $post_tag ?>
    </a>
  <?php endforeach ?>

  <!-- Display posted date -->
  <div class="posted-date">
    Posted <?= $page->date()->toDate('F j, Y') ?>
  </div>


  <?= $page->text()->kirbytext() ?>

  <a href="<?= url('blog') ?>">Back…</a>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>