<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main>
    <!-- grab title from txt -->
    <div class="about-title">
        <h1><?= $page->title() ?></h1>
    </div>
    
    <!-- "Blocks()" below refers to what I named the field in the project blueprint -->
    <?php foreach ($page->Blocks()->toBlocks() as $block): ?>
      <div id="<?= $block->id() ?>" class="block-<?= $block->type() ?>">
        <?= $block ?>
      </div>
    <?php endforeach ?>

<!-- Submit an opportunity promo -->
<div class="promo">🥳 <a href="https://www.newmediacaucus.org/join/" >Become a Member!</a> 🐝</div>

</main>

<!-- bottom section -->
<?php snippet('footer') ?>
