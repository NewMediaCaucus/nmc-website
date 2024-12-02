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
    <p><?= $page->description()->kirbytext() ?></p>
    <?php
        // Setup filters for each category
        $initiatives = $page->children()->listed();
        $current = $initiatives->filterBy('category', 'current');
        $previous = $initiatives->filterBy('category', 'previous');
    ?>

    <h2>Current</h2>

    <h2>Previous</h2>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
