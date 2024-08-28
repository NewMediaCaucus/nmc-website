<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main>
  <!-- Grab title text from txt field -->
  <?= $page->title() ?>
  <?= $page->text() ?>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
