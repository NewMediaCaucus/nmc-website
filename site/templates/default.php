<!-- nav section -->
<?php snippet('navigation') ?>

<!-- top section -->
<?php snippet('header') ?>

<!-- content section -->
<main>
  <!-- Grab title text from txt field -->
  <h1><?= $page->title() ?></h1>
  <p> <?= $page->text()->kirbytext() ?> </p>
</main>


<!-- bottom section -->
<?php snippet('footer') ?>
