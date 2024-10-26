<!-- nav section -->
<?php snippet('navigation') ?>

<!-- top section -->
<?php snippet('header') ?>

<!-- content section -->
<main>
  <!-- Grab title text from txt field -->
  <?= $page->title() ?>
  <?= $page->text() ?>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
