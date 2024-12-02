<!-- top section -->
<?php snippet('header') ?>

<!-- nav section -->
<?php snippet('navigation') ?>

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
    
    <?php if ($page->long_description()->isNotEmpty()): ?>
        <p><?= $page->long_description()->kirbytext() ?></p>
    <?php endif ?>
    <br><br>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
