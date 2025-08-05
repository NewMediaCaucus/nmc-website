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
    
    <!-- here's where each block gets rendered on a loop -->
    <?php foreach ($page->Blocks()->toBlocks() as $block): ?>
        <?= $block ?>
    <?php endforeach ?>

<!-- Submit an opportunity promo -->
<div class="promo">🥳 <a href="https://www.newmediacaucus.org/join/" >Become a Member!</a> 🐝</div>

</main>

<!-- bottom section -->
<?php snippet('footer') ?>
