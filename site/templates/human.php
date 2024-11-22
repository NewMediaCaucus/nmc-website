<!-- nav section -->
<?php snippet('navigation') ?>

<!-- top section -->
<?php snippet('header') ?>

<!-- content section -->
<main>
    <br><br>
    <!-- grab the first/only image in the folder -->
    <?php if($image = $page->image()): ?>
        <!-- TODO: What div should go around this image? -->
        <img class="post-image" 
            src="<?= $image->crop(960,960)->url() ?>" 
            alt="<?= $page->alt()->value() ?>" 
            width="960px">
    <?php endif ?>

    <?php if ($page->title()->isNotEmpty()): ?>
        <h2>
            <?= $page->title()->html() ?>
        </h2>
    <?php endif ?>
    <?php if ($page->nmc_title()->isNotEmpty()): ?>
        <p class="nmc-title"><?= $page->nmc_title() ?></p>
    <?php endif ?>

    <?php if ($page->professional_title()->isNotEmpty()): ?>
        <p class="professional-title"><?= $page->professional_title() ?></p>
    <?php endif ?>
    
    <?php if ($page->bio()->isNotEmpty()): ?>
        <p><?= $page->bio()->kirbytext() ?></p>
    <?php endif ?>
    <br><br>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
