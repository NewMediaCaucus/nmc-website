<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

<!-- content section -->
<main>
    <br><br>
    <!-- grab the first/only image in the folder -->
    <?php if ($image = $page->image()): ?>
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
    <!-- Display artist name -->
    <p class="artist_name"><?= $page->artist_name()->kirbytext() ?></p>
    <!-- Display short description -->

    <?php if ($page->long_description()->isNotEmpty()): ?>
        <p><?= $page->long_description()->kirbytext() ?></p>
    <?php endif ?>
    <br><br>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>