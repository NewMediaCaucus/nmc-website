<!-- top section -->
<?php snippet('header') ?>

<!-- content section -->
<main>

<section class="content article">
  <article>
    <h1><?= $page->title()->html() ?></h1>
    <?= $page->text()->kirbytext() ?>

    <a href="<?= url('blog') ?>">Back…</a>

  </article>
</section>

</main>

<!-- bottom section -->
<?php snippet('footer') ?>