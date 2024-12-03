<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main>

<section class="content article">
  <article>
    <h1><?= $page->title()->html() ?></h1>

    <?php if($image = $page->image()): ?>
        <!-- TODO: What div should go around this image? -->
        <img  
            src="<?= $image->crop(468,468)->url() ?>" 
            alt="<?= $page->alt()->value() ?>" 
        width="468px">
    <?php endif ?>

    <?= $page->text()->kirbytext() ?>

    <a href="<?= url('blog') ?>">Back…</a>

  </article>
</section>

</main>

<!-- bottom section -->
<?php snippet('footer') ?>