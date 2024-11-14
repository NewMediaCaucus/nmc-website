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

    <!-- TODO: Style this -->
    <?php if ($page->category()->isNotEmpty()): ?>
        <?php
        $field = $page->blueprint()->field('category');
        $value = $page->category()->value();
        foreach ($page->category()->split() as $category):
            ?>
            <a href="<?= url('opportunities/' . strtolower($value) . 's') ?>" class="category">
                <?= $field['options'][$value] ?? $value ?>
            </a>
        <?php endforeach; ?>
    <?php endif ?>

    <!-- Display posted date -->
    <div class="posted-date">
        Posted <?= $page->date()->toDate('F j, Y') ?>
            </div>
    
    <?php if ($page->long_description()->isNotEmpty()): ?>
        <p><?= $page->long_description()->kirbytext() ?></p>
    <?php endif ?>
    <br><br>
</main>

<!-- bottom section -->
<?php snippet('footer') ?>
